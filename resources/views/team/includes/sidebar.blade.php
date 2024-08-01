    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="menu-title">THE TOWLERS TEAM</li>

                <li class="{{ $page == 'Dashboard' ? 'mm-active' : '' }}">
                    <a  href="{{ URL::to('/panel-team') }}" class="{{ $page == 'Dashboard' ? 'mm-active' : '' }}" aria-expanded="false">
                        <div class="menu-icon">

                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="">
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






                <li
                class="{{ $page == 'Reports View' ? 'mm-active' : '' }}">
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
                    <li><a class="nav-text" href="{{ route('team.report_List_exporter_textile_declearation_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">
                        EXPORTERS TEXTILE 
                        <sub>
                            DECLARATION OF COUNTRY OF ORIGIN
                        </sub>
                        </a>
                    </li>
                    <li><a class="nav-text" href="{{ route('team.report_List_certificate_origins_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN - TMA</a></li>

                    <li> <a class="nav-text" href="{{ route('team.report_List_custom_canda_invoice') }}"
                            class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">
                            CANADA INVOICE</a></li>
                            <li><a class="nav-text" href="{{ route('team.report_List_form_59_a_invoice') }}"
                                class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">Form 59 A INVOICE</a></li>
                 
                        
                    <li><a class="nav-text" href="{{ route('team.report_List_certificate_origin_no627120_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE ORIGIN 627120</a></li>
                    <li><a class="nav-text" href="{{ route('team.report_List_certificate_origin_com_dec_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE ORIGIN <sub>(Combined Declaration)</sub></a></li>
                    <li><a class="nav-text" href="{{ route('team.report_List_certificate_origin_com_dec_form_ip_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN<sub>(Combined Declaration and Certificate) Form IP</sub></a></li>
                    <li><a class="nav-text" href="{{ route('team.report_List_certificate_origin_com_dec_form_a_invoice') }}"
                        class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}">CERTIFICATE OF ORIGIN<sub>(Combined Declaration and Certificate) Form A</sub></a></li>

                </ul>
            </li>
            <li>
                <a href="{{ route('team.report_List_commercial_invoice') }}"
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
            <li>
                <a href="{{ route('team.report_List_packing_list') }}"
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
                    <span class="nav-text">PACKING LIST </span>
                </a>
            </li>

                <li class="menu-title"></li>

                <li>
                    <a href="{{route('team.logout')}}" class=""
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.8096 12.0214H9.76855" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.8813 9.10626L21.8093 12.0213L18.8813 14.9373" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                        </div>
                        <span class="nav-text">LOGOUT</span>
                    </a>
                </li>



            </ul>

        </div>
    </div>
