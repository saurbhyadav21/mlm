<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Helper\Reply;
use App\Http\Requests\Front\Register\StoreRequest;
use App\Notifications\EmailVerificationSuccess;
use App\Role;
use App\SeoDetail;
use App\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends FrontBaseController
{
    public function index(){

        if (\user()){
            return redirect(getDomainSpecificUrl(route('login'), \user()->company));
        }
        $this->seoDetail = SeoDetail::where('page_name', 'home')->first();
        $this->pageTitle = 'Sign Up';

        $view = ($this->setting->front_design == 1) ? 'saas.register' : 'front.register';

        return view($view, $this->data);

    }

    public function store(StoreRequest $request) {

        $company = new Company();

        if(!$company->recaptchaValidate($request)){
            return Reply::error('Recaptcha not validated.');
        }

        DB::beginTransaction();
        try {
            $company->company_name = $request->company_name;
            $company->company_email = $request->email;

            if (module_enabled('Subdomain')){
                $company->sub_domain = $request->sub_domain;
            }
            $company->save();

            $user = $company->addUser($company, $request);
            $message = $company->addEmployeeDetails($user);
            $company->assignRoles($user);

            DB::commit();

        } catch (\Swift_TransportException $e) {
            DB::rollback();
            return Reply::error('Please contact administrator to set SMTP details to add company', 'smtp_error');
        } catch (\Exception $e) {
            DB::rollback();
            return Reply::error('Some error occurred when inserting the data. Please try again or contact support');
        }
        return Reply::success($message);
    }

    public function getEmailVerification($code)
    {
        $this->pageTitle = 'modules.accountSettings.emailVerification';
        $this->message = User::emailVerify($code);
        return view('auth.email-verification', $this->data);
    }

}
