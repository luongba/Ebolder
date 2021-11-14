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
                        Sending  Domain
                        <div class="page-title-subheading">Add own Domain to Setup Email send to customer from your domain.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                                    <span class="btn-icon-wrapper pr-2">
                                        <button class="btn-icon btn dev-button btn-primary" data-toggle="modal" data-target="#exampleModal" style="padding: 10px 15px;">
                                            <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Add Sending Domain
                                        </button>
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
                                    <th class="text-center">#</th>
                                    <th>Domain</th>

                                    <th class="text-center">Status</th>

                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('id-domain')}}"><button class="btn-wide btn btn-success">VERIFY</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#2</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo1.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#3</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo2.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('id-domain')}}"><button class="btn-wide btn btn-success">VERIFY</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#4</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo3.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('id-domain')}}"><button class="btn-wide btn btn-success">VERIFY</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#2</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo1.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#3</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo2.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="{{route('id-domain')}}"><button class="btn-wide btn btn-success">VERIFY</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#4</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo3.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#4</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo3.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#4</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="{{route('id-domain')}}" class="text-dark">shopifydemo3.com</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="">
                                            <a href="sending-domain-verify-detail.html"><button class="btn-wide btn btn-success">DETAIL</button></a>
                                            <span data-toggle="modal" data-target="#delete-send-domain"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Addon Domain">
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
    <div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Domain Addon Sending Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="domain-addon" class="text-bold">Root Domain Addon <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is your website URL, example: istore.com"></i></label>
                                <input type="text" class="form-control" id="domain-addon" name="Domain Addon" value="istore.com" aria-invalid="false">
                            </div>
                            <div class="position-relative">
                                <label for="domain-addon" class="text-bold">Sending domain Addon <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Specify the subdomain from which your email will send. "></i></label>
                            </div>
                            <div class="position-relative form-group">
                                <input type="text" class="form-control" id="domain-addon" style="width: 50%; display: inline;" name="Domain Addon" value="marketing" aria-invalid="false">
                                .<span class="root-domain-addon">istore.com</span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{route('id-domain')}}"><button type="button" class="btn btn-primary">Add Domain</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal delete-->
    <div class="modal fade" id="delete-send-domain"  tabindex="-1" role="dialog"
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
                                You will not be able to send emails from your domain if  deleted sending domain.
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{route('id-domain')}}"><button type="button" class="btn btn-primary">Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
