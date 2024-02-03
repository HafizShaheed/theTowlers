    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="menu-title">I SCREENING CLIENT</li>

                <li>
                    <a  href="{{ URL::to('/company') }}" class="{{ $page == 'Dashboard' ? 'mm-active' : '' }}" aria-expanded="false">
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

                        <span class="nav-text">Risk Analytics</span>
                    </a>
                </li>





                <li>
                    <a href="{{ URL::to('company/report') }}" class="{{ $page == 'Reports Managment' || $page == 'View Reports' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.0974 14.0786H8.1474" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.2229 10.6388H8.14655" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">Insights </span>
                    </a>
                </li>


                <li>
                    <a href="{{ URL::to('company/profile-setting') }}" class="{{ $page == 'Profile Setting' || $page == 'Profile Setting' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                            xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z"
                                    stroke="#888888" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z"
                                    stroke="#888888" stroke-width="1.42857"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">Profile </span>
                    </a>
                </li>






                <li class="menu-title"></li>

                <li>
                    <a href="{{route('web.logout')}}" class=""
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21.8096 12.0214H9.76855" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.8813 9.10626L21.8093 12.0213L18.8813 14.9373" stroke="#888888" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                        </div>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>



            </ul>

        </div>
    </div>
