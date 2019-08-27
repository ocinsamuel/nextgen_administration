@include('header')
            
            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

                @include('navbar')
                
                 <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title ">
                                    Event
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        @if(session()->has('addEvent'))
                            <?php
                                $resp = Session::get('addEvent');
                            ?>

                            @if($resp['status'] == 1)
                                <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-exclamation-1"></i>
                                        <span></span>
                                    </div>
                                    <div class="m-alert__text">
                                        <strong>
                                            Well done!
                                        </strong>
                                        {{ $resp['message'] }}
                                    </div>
                                    <div class="m-alert__close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                            @if($resp['status'] == 0)
                                <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-exclamation-1"></i>
                                        <span></span>
                                    </div>
                                    <div class="m-alert__text">
                                        <strong>
                                            Oh snap!
                                        </strong>
                                        {{$resp['message']}}
                                    </div>
                                    <div class="m-alert__close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif

                        @endif
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__body">
                                <!--begin: Search Form -->
                                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                    <div class="row align-items-center">
                                        <div class="col-xl-8 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                <div class="col-md-4">
                                                    <div class="m-input-icon m-input-icon--left">
                                                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="m_form_search">
                                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                                            <span>
                                                                <i class="la la-search"></i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                            <a href="#" data-toggle="modal" data-target="#add_event_modal" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill add_event">
                                                <span>
                                                    <i class="flaticon-time-1"></i>
                                                    <span>
                                                        Add
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Search Form -->
                                <!--begin: Datatable -->
                                <script type="text/javascript">
                                    var data = <?php echo $data;?>;
                                </script>
                                <div class="m_datatable" id="event_table"></div>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end:: Body -->
            
                @include('footer')
            
        