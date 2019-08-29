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
                                    Dashboard
                                </h3>
                            </div>
                            <div>
                                <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                                    <span class="m-subheader__daterange-label">
                                        <span class="m-subheader__daterange-title"></span>
                                        <span class="m-subheader__daterange-date m--font-brand home_daterange"></span>
                                    </span>
                                    <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                        <i class="la la-angle-down"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                        <!--Begin::Main Portlet-->
                        <div class="row">
                            <div class="col-xl-12">
                                <!--begin::Portlet-->
                                <div class="m-portlet" id="m_portlet">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon">
                                                    <i class="flaticon-list-3"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Attendance
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools m--hide">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                                        <span>
                                                            <i class="la la-plus"></i>
                                                            <span>
                                                                Add Event
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body" id="home_body">
                                        <!--begin: Search Form -->
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row align-items-center">
                                                <div class="col-xl-8 order-2 order-xl-1">
                                                    <div class="form-group m-form__group row align-items-center">
                                                        <div class="col-md-4">
                                                            <div class="m-form__group m-form__group--inline">
                                                                <div class="m-form__label">
                                                                    <label>
                                                                        Branch:
                                                                    </label>
                                                                </div>
                                                                <div class="m-form__control">
                                                                    <div class="m-form__control">
                                                                        <select class="form-control" id="m_form_status">
                                                                            <option value="">
                                                                                All
                                                                            </option>
                                                                            <option value="1">
                                                                                Barsi
                                                                            </option>
                                                                            <option value="2">
                                                                                Aruna
                                                                            </option>
                                                                            <option value="3">
                                                                                Harris
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-md-none m--margin-bottom-10"></div>
                                                        </div>
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
                                            </div>
                                        </div>
                                        <!--end: Search Form -->

                                        <style type="text/css">
                                            #html_table .no span{
                                                width: 50px !important;
                                            }
                                        </style>
                                        
                                        <script type="text/javascript">
                                            var data = <?php echo $data;?>;
                                        </script>
                                        <div class="m_datatable" id="html_table"></div>
                                    </div>

                                    <div class="m-portlet__foot" id="home_footer" style="text-align: right;">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 m--valign-middle" id="home_footer_text">
                                                Showing records from <span class="m--font-brand m--font-boldest">All Dates</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Portlet-->
                            </div>
                        </div>
                        <!--End::Main Portlet-->
                    </div>
                </div>

            </div>
            <!-- end:: Body -->
            
                @include('footer')
            
        