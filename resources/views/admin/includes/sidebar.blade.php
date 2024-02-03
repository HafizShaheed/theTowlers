    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="menu-title">I SCREENING ADMIN</li>
                <li>
                    <a href="{{ URL::to('/panel/dashboard') }}" class="{{ $page == 'Dashboard' ? 'mm-active' : '' }}"
                        aria-expanded="false">
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
                        <span class="nav-text">Dashboard</span>
                    </a>

                </li>


                <!-- <li>
                    <a href="#" class="" aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="20" height="20" viewBox="0 0 22 22" fill="none"
                                xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.8064 7.62355L20.184 6.54346C19.6574 5.62954 18.4905 5.31426 17.5753 5.83866V5.83866C17.1397 6.09528 16.6198 6.16809 16.1305 6.04103C15.6411 5.91396 15.2224 5.59746 14.9666 5.16131C14.8021 4.88409 14.7137 4.56833 14.7103 4.24598V4.24598C14.7251 3.72916 14.5302 3.22834 14.1698 2.85761C13.8094 2.48688 13.3143 2.2778 12.7973 2.27802H11.5433C11.0367 2.27801 10.5511 2.47985 10.1938 2.83888C9.83644 3.19791 9.63693 3.68453 9.63937 4.19106V4.19106C9.62435 5.23686 8.77224 6.07675 7.72632 6.07664C7.40397 6.07329 7.08821 5.98488 6.81099 5.82035V5.82035C5.89582 5.29595 4.72887 5.61123 4.20229 6.52516L3.5341 7.62355C3.00817 8.53633 3.31916 9.70255 4.22975 10.2322V10.2322C4.82166 10.574 5.18629 11.2055 5.18629 11.889C5.18629 12.5725 4.82166 13.204 4.22975 13.5457V13.5457C3.32031 14.0719 3.00898 15.2353 3.5341 16.1453V16.1453L4.16568 17.2345C4.4124 17.6797 4.82636 18.0082 5.31595 18.1474C5.80554 18.2865 6.3304 18.2248 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6515 8.2191 17.7821C8.70725 17.9128 9.12299 18.233 9.37392 18.6716C9.53845 18.9488 9.62686 19.2646 9.63021 19.5869V19.5869C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5 14.7053 20.6491 14.7103 19.5961V19.5961C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6806 16.6233 17.6831C16.9449 17.6917 17.2594 17.7797 17.5387 17.9393V17.9393C18.4515 18.4653 19.6177 18.1543 20.1474 17.2437V17.2437L20.8064 16.1453C21.0615 15.7074 21.1315 15.1859 21.001 14.6963C20.8704 14.2067 20.55 13.7893 20.1108 13.5366V13.5366C19.6715 13.2839 19.3511 12.8665 19.2206 12.3769C19.09 11.8872 19.16 11.3658 19.4151 10.9279C19.581 10.6383 19.8211 10.3981 20.1108 10.2322V10.2322C21.0159 9.70283 21.3262 8.54343 20.8064 7.63271V7.63271V7.62355Z"
                                    stroke="#130F26" stroke-width="0.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <circle cx="12.1747" cy="11.889" r="2.63616" stroke="#130F26" stroke-width="0.8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="nav-text">Setting</span>
                    </a>
                </li> -->


                <li class="{{ $page == 'Reports View' ? 'mm-active' : '' }}">
                    <a href="{{ URL::to('/panel/report') }}" class="{{ $title == 'Reports Managment' ? 'mm-active' : '' }}"
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
                        <span class="nav-text">Reports</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/panel/client') }}" class="{{ $title == 'Client Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
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
                        <span class="nav-text">Client Managment</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL::to('/panel/team') }}" class="{{ $title == 'Team Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
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
                        <span class="nav-text">Team Managment</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('/panel/third-party') }}" class="{{ $title == 'Third-Party Managment' ? 'mm-active' : '' }}"
                        aria-expanded="false">
                        <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
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
                        <span class="nav-text">Third-Party </span>
                    </a>
                </li>

                <li class="menu-title"></li>

                <li>
                    <a href="{{route('admin.logout')}}" class=""
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
