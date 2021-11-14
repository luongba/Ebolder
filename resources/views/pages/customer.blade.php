@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->

        <!---------------------     End head content  section     --------------------->
        <!---------------------     Start main content section     --------------------->
        <div class="tabs-animation">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-add-user lnr icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            Customers
                            <div class="page-title-subheading">Listing the all Customer you get from campaigns and other ways.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn dev-button btn-primary" style="padding: 10px 15px;">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-plus dev-import-button fa-w-20"></i>
                                                </span>
                                Add Customer
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" style="">
                                <button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon lnr-upload upload-customer-icon"></i> CSV Import</button>
                                <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#add-customer-manually"><i class="nav-link-icon lnr-hand upload-customer-icon"></i>Add Customers Manually</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---------------------     Start report campaigns section     --------------------->


            <!---------------------     End report campaign section     --------------------->

            <!---------------------     Start tab filter campaigns section     --------------------->

            <ul class="body-tabs tabs-animated body-tabs-animated nav mb-3">
                <li class="nav-item">
                    <div class="search-wrapper active" style="width: 300px;">
                        <div class="input-holder dev-search">
                            <input type="text" class="search-input" placeholder="Search Customer ...">
                            <button class="search-icon" style="background: rgb(212 218 222);">
                                <span></span>
                            </button>
                        </div>

                    </div>
                </li>
                <li class="nav-item ">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow-secondary btn-outline-2x btn-shadow dropdown-toggle btn filter-box">
                                            <span class="btn-icon-wrapper pr-2 opacity-9">
                                                <i class="pe-7s-filter lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            Customer Filter
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" style="">
                            <button type="button" tabindex="0" class="dropdown-item">Name/Email</button>
                            <button type="button" tabindex="0" class="dropdown-item">Create At</button>
                            <button type="button" tabindex="0" class="dropdown-item">Source Customer</button>
                            <button type="button" tabindex="0" class="dropdown-item">Mailable</button>
                            <button type="button" tabindex="0" class="dropdown-item">Order count</button>
                            <button type="button" tabindex="0" class="dropdown-item">Cart value</button>
                            <button type="button" tabindex="0" class="dropdown-item">Tags</button>
                        </div>

                    </div>
                </li>
                <li class="nav-item item-show-page">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow-secondary btn-outline-2x btn-shadow dropdown-toggle btn filter-box">
                                            <span class="btn-icon-wrapper pr-2 opacity-9">
                                                <i class="pe-7s-file lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            20 Per page
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <button type="button" tabindex="0" class="dropdown-item">20</button>
                            <button type="button" tabindex="0" class="dropdown-item">40</button>
                            <button type="button" tabindex="0" class="dropdown-item">60</button>
                            <button type="button" tabindex="0" class="dropdown-item">80</button>
                            <button type="button" tabindex="0" class="dropdown-item">100</button>
                        </div>

                    </div>
                </li>
                <li class="nav-item item-show-page">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow-secondary btn-outline-2x btn-shadow dropdown-toggle btn filter-box">
                                            <span class="btn-icon-wrapper pr-2 opacity-9">
                                                <i class="lnr-download lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            Export Customers
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <button type="button" tabindex="0" class="dropdown-item">Export CSV</button>

                        </div>

                    </div>
                </li>

            </ul>
            <!---------------------     Start tab filter campaigns section     --------------------->

            <!---------------------     Start list campaigns section     --------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">Email</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">Create At</th>
                                    <th class="text-left">Source Customer</th>
                                    <th class="text-left">Status <i class="fa-info-circle fa fa-w-20" style="font-size: 1.1em;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Status it help you check customer can Mailable or Not Mailable, Not Mailable is customer unsubscribed Email"></i></th>
                                    <th class="text-left">Campaign Name</th>
                                    <th class="text-left">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">shopify</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-danger">Not Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-primary">Campaign</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-primary">Campaign</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-warning">Imported</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-danger">Not Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">shopify</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('customer-detail')}}" class="text-dark">customer@ebolder.com</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">James</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">shopify</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">
                                                        <span class="badge badge-pill badge-success">Mailable</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="#" target="_blank">Black Friday Campaign</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">

                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <nav class="" aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="javascript:void(0);" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------     End listing campaign section     --------------------->

            <div class="row">


            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="delete-newsletter"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                Clicking delete will permanently remove your Customer.
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="sending-domain-verify.html"><button type="button" class="btn btn-primary">Delete Customer</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal add customer manually-->

    <div class="modal fade" id="add-customer-manually"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="signupForm">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="email" class="">Email Customer</label>
                                <input name="email" id="email" placeholder="Enter Email Customer" type="email" class="form-control">
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="firstname" class="">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="lastname" class="">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
