@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Coupons
                        <div class="page-title-subheading">Create coupon swiftly and win more sales with Ebolder!.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                                    <span class="btn-icon-wrapper pr-2">
                                        <a class="btn-icon btn dev-button btn-primary" href="{{route('coupon-Create')}}" style="padding: 10px 15px;">
                                            <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Create New Coupon
                                        </a>
                                    </span>
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
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th>Title</th>

                                    <th class="text-left">Source</th>

                                    <th class="text-left">Behavior</th>
                                    <th class="text-left">Coupon Code</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}">
                                                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i></button>
                                            </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#2</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 20 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Unique Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">AB23456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 30 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Master Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">A123456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#2</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('coupon-edit')}}" class="text-dark">Off 20 % signup</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Shopify</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Unique Coupon</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">AB23456</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('coupon-edit')}}"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit coupon">
                                                    <i class="lnr-pencil btn-icon-wrapper"></i>
                                                </button> </a>
                                            <span data-toggle="modal" data-target="#delete-coupon">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Coupon">
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

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
