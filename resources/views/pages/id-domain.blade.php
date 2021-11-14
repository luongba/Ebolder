@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-mail icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Sending  Domain Verify
                        <div class="page-title-subheading">This page allows you to set up your dedicated sending domain for use on Ebolder.</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->

            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div id="smartwizard">
                                <ul class="forms-wizard">
                                    <li>
                                        <a href="#step-1">
                                            <em>1</em>
                                            <span>Setup Domain</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <em>2</em>
                                            <span>Verify Domain Records</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <em>3</em>
                                            <span>Completed Setup</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="form-wizard-content">
                                    <div id="step-1">
                                        <div class="dev-domain-setup"><h6 class="text-bold">Domain Setup</h6></div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <span class="root-domain-title">Root Domain:</span>
                                                    <span>istore.com </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <span class="root-domain-title">Sending Domain:</span>
                                                    <span>marketing.istore.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dev-domain-setup"><h6 class="text-bold">DNS Records Setup</h6></div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <p class="text-left">To proceed, you will need to <a target="_blank" href="https://help.klaviyo.com/hc/en-us/articles/115000357752-Setting-Up-a-Dedicated-Sending-Domain#examples-of-adding-cname-records1">update your DNS records </a> using the values in the table below - this can be done in your DNS provider’s portal.This allows sending on your domain’s behalf, and ensures your domain isn’t used by someone you don’t know.</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-left">When you have implemented these values, you may proceed to have your records verified.</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="dev-table-responsive">
                                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-left">#</th>
                                                                <th class="text-left">Type</th>

                                                                <th class="text-left">Host <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="You need copy This is and setup to Your subdomain name that points to the site under value CNAME only"></i></th>

                                                                <th class="text-left">Value <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="You need copy This is value and add to domain Records"></i></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="text-left text-muted">#1</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">marketing</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#2</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl._domainkey</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl.domainkey.u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#3</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl2._domainkey</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl2.domainkey.u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#4</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">txt</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">@</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">klaviyo-site-verification=UvQpAP</div>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="d-block text-center card-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-2">
                                        <div class="dev-domain-setup"><h6 class="text-bold">Domain Setup</h6></div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <span class="root-domain-title">Root Domain:</span>
                                                    <span>istore.com </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <span class="root-domain-title">Sending Domain:</span>
                                                    <span>marketing.istore.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dev-domain-setup"><h6 class="text-bold">DNS Records Setup</h6></div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <p class="text-left">To proceed, you will need to <a target="_blank" href="https://help.klaviyo.com/hc/en-us/articles/115000357752-Setting-Up-a-Dedicated-Sending-Domain#examples-of-adding-cname-records1">update your DNS records </a> using the values in the table below - this can be done in your DNS provider’s portal.This allows sending on your domain’s behalf, and ensures your domain isn’t used by someone you don’t know.</p>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="text-left">When you have implemented these values, you may proceed to have your records verified.</p>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="dev-table-responsive">
                                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-left">#</th>
                                                                <th class="text-left">Type</th>

                                                                <th class="text-left">Host <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="You need copy This is and setup to Your subdomain name that points to the site under value CNAME only"></i></th>

                                                                <th class="text-left">Value <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="You need copy This is value and add to domain Records"></i></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="text-left text-muted">#1</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">marketing</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#2</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl._domainkey</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl.domainkey.u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#3</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">cname</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl2._domainkey</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">kl2.domainkey.u161779.wl030.sendgrid.net</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left text-muted">#4</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">

                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading">
                                                                                    <span class="text-dark">txt</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">@</div>
                                                                </td>
                                                                <td class="text-left">
                                                                    <div class="">klaviyo-site-verification=UvQpAP</div>
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="d-block text-center card-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="step-3">
                                        <div class="no-results">
                                            <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                <span class="swal2-success-line-tip"></span>
                                                <span class="swal2-success-line-long"></span>
                                                <div class="swal2-success-ring"></div>
                                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                            </div>
                                            <div class="results-subtitle mt-4">Completed Setup!</div>
                                            <div class="results-title">You are finished setup sending domain email, For now you can use your domain server to do send email marketing to Customer.</div>
                                            <div class="mt-3 mb-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="clearfix">

                                <button type="button" id="next-btn" class="mr-3 btn-shadow btn-primary btn-wide float-left btn-pill btn-hover-shine btn dev-submit-button">Verify Records</button>
                                <button type="button" id="cancel-btn" class="btn-shadow float-left btn-wide btn-pill btn btn-outline-secondary dev-submit-button">Cancel Domain Setup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
