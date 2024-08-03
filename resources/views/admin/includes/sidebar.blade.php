    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="menu-title">THE TOWLERS ADMIN</li>
                <li>
                    <a href="{{ URL::to('/panel/dashboard') }}"
                        class="{{ $page == 'Dashboard' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="">
                                <path
                                    d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">DASHBOARD</span>
                    </a>

                </li>

                <li>
                    <a href="{{ URL::to('/panel/team') }}"
                        class="{{ $title == 'Team Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.79222 13.9396C12.1738 13.9396 15.0641 14.452 15.0641 16.4989C15.0641 18.5458 12.1931 19.0729 8.79222 19.0729C5.40972 19.0729 2.52039 18.5651 2.52039 16.5172C2.52039 14.4694 5.39047 13.9396 8.79222 13.9396Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.79223 11.0182C6.57206 11.0182 4.77173 9.21874 4.77173 6.99857C4.77173 4.7784 6.57206 2.97898 8.79223 2.97898C11.0115 2.97898 12.8118 4.7784 12.8118 6.99857C12.8201 9.21049 11.0326 11.0099 8.82064 11.0182H8.79223Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15.1095 9.9748C16.5771 9.76855 17.7073 8.50905 17.7101 6.98464C17.7101 5.48222 16.6147 4.23555 15.1782 3.99997"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17.0458 13.5045C18.4675 13.7163 19.4603 14.2149 19.4603 15.2416C19.4603 15.9483 18.9928 16.4067 18.2374 16.6936"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">TEAM </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.report_List_commercial_invoice') }}"
                        class="{{ $title == 'Team Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M14.4065 14.8714H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M14.4065 11.0338H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10.3137 7.2051H7.78827" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.5829 2.52066C14.5829 2.52066 7.54563 2.52433 7.53463 2.52433C5.00463 2.53991 3.43805 4.20458 3.43805 6.74374V15.1734C3.43805 17.7254 5.01655 19.3965 7.56855 19.3965C7.56855 19.3965 14.6049 19.3937 14.6168 19.3937C17.1468 19.3782 18.7143 17.7126 18.7143 15.1734V6.74374C18.7143 4.19174 17.1349 2.52066 14.5829 2.52066Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">COMMERCIAL </span>
                    </a>
                </li>
                <li  style="margin-bottom: 7px !important;">
                    <a href="{{ route('admin.report_List_packing_list') }}"
                        class="{{ $title == 'Team Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M14.4065 14.8714H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M14.4065 11.0338H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10.3137 7.2051H7.78827" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.5829 2.52066C14.5829 2.52066 7.54563 2.52433 7.53463 2.52433C5.00463 2.53991 3.43805 4.20458 3.43805 6.74374V15.1734C3.43805 17.7254 5.01655 19.3965 7.56855 19.3965C7.56855 19.3965 14.6049 19.3937 14.6168 19.3937C17.1468 19.3782 18.7143 17.7126 18.7143 15.1734V6.74374C18.7143 4.19174 17.1349 2.52066 14.5829 2.52066Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">PACKING SLIP</span>
                    </a>
                </li>

                <li
                    class="{{ $page == 'Reports View' ? 'mm-active' : '' }} ">
                    <a href="javascript:void(0);" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M14.4065 14.8714H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M14.4065 11.0338H7.78821" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M10.3137 7.2051H7.78827" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14.5829 2.52066C14.5829 2.52066 7.54563 2.52433 7.53463 2.52433C5.00463 2.53991 3.43805 4.20458 3.43805 6.74374V15.1734C3.43805 17.7254 5.01655 19.3965 7.56855 19.3965C7.56855 19.3965 14.6049 19.3937 14.6168 19.3937C17.1468 19.3782 18.7143 17.7126 18.7143 15.1734V6.74374C18.7143 4.19174 17.1349 2.52066 14.5829 2.52066Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span class="nav-text">FORMS</span>
                    </a>
                    <ul aria-expanded="true">
                        <li><a class="nav-text" href="{{ route('admin.report_List_exporter_textile_declearation_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">
                            EXPORTERS TEXTILE 
                            <sub>
                                DECLARATION OF COUNTRY OF ORIGIN
                            </sub>
                            </a>
                        </li>
                        <li><a class="nav-text" href="{{ route('admin.report_List_certificate_origins_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN - TMA</a></li>

                       
                                
                              
                                <li><a class="nav-text" href="{{ route('admin.report_List_form_59_a_invoice') }}"
                                    class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">Form 59 A INVOICE</a></li>
                      
                       
                        <li><a class="nav-text" href="{{ route('admin.report_List_certificate_origin_no627120_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE ORIGIN 627120</a></li>
                        <li><a class="nav-text" href="{{ route('admin.report_List_certificate_origin_com_dec_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN <sub>(PREFERENTIAL ARRANGEMENTS AMONG DEVELOPING COUNTRIES NEGOTIATED IN GATT)</sub></a></li>
                        <li><a class="nav-text" href="{{ route('admin.report_List_certificate_origin_com_dec_form_ip_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN <sub>- INDONESIA - PAKISTAN PREFERENTIAL TRADE AGREEMENT (IPPTA)</sub></a></li>
                        <li><a class="nav-text" href="{{ route('admin.report_List_certificate_origin_com_dec_form_a_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN<sub>(Combined Declaration and Certificate) Form A</sub></a></li>
                        <li> <a class="nav-text" href="{{ route('admin.report_List_custom_canda_invoice') }}"
                                class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">
                                CANADA INVOICE</a></li>

                    </ul>
                </li>

             
                
                <li class="menu-title"></li>
                
                <li>
                    <a href="{{ route('admin.logout') }}" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545"
                                    stroke="#888888" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M21.8096 12.0214H9.76855" stroke="#888888" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18.8813 9.10626L21.8093 12.0213L18.8813 14.9373" stroke="#888888"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">LOGOUT</span>
                    </a>
                </li>



            </ul>

        </div>
    </div>
