<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('/') }}backend/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('/') }}backend/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Menu Options</li>
            <li class="side-nav-item {{ request()->is('dashboard') ? 'menuitem-active' : '' }}">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Only for admin</li>

            <li class="side-nav-item {{ request()->is('admin/permissions*') ? 'menuitem-active' : '' }} {{ request()->is('admin/roles*') ? 'menuitem-active' : '' }} {{ request()->is('admin/users*') ? 'menuitem-active' : '' }}">
                <a data-bs-toggle="collapse" href="#userRolePermission" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> User Management </span>
                </a>
                <div class="collapse" id="userRolePermission">
                    <ul class="side-nav-second-level">
                        <li class="{{ request()->is('admin/permissions*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('permissions.index') }}" class="{{ request()->is('admin/permission') || request()->is('admin/permissions/*') ? 'active' : '' }}">Permission</a>
                        </li>
                        <li class="{{ request()->is('admin/roles*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('roles.index') }}" class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">Role</a>
                        </li>
                        <li class="{{ request()->is('admin/users*') ? 'menuitem-active' : '' }}">
                            <a href="{{ route('users.index') }}" class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">User</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('settings.index') }}" class="side-nav-link">
                    <i class="dripicons-gear"></i>
                    <span> Settings </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#academicLevel" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Academic</span>
                </a>
                <div class="collapse" id="academicLevel">
                    <ul class="side-nav-second-level">
                        <li>
                            <a data-bs-toggle="collapse" href="#class" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Class</span>
                            </a>
                            <div class="collapse" id="class">
                            <ul class="side-nav-third-level">
                                <li>
                                    <a href="{{route('classes.create')}}">Add Class</a>
                                    <a href="{{route('classes.index')}}">Manage Class</a>
                                </li>
                            </ul>
                            </div>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" href="#section" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Section</span>
                            </a>
                            <div class="collapse" id="section">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('sections.create')}}">Add Section</a>
                                        <a href="{{route('sections.index')}}">Manage Section</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#subject" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Subject</span>
                            </a>
                            <div class="collapse" id="subject">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('subjects.create')}}">Add Subject</a>
                                        <a href="{{route('subjects.index')}}">Manage Subject</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#teacher" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Teacher</span>
                            </a>
                            <div class="collapse" id="teacher">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('teachers.create')}}">Add Teacher</a>
                                        <a href="{{route('teachers.index')}}">Manage Teacher</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#parent" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Parent</span>
                            </a>
                            <div class="collapse" id="parent">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('parents.create')}}">Add Parent</a>
                                        <a href="{{route('parents.index')}}">Manage Parent</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#academicStaff" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Academic Staff</span>
                            </a>
                            <div class="collapse" id="academicStaff">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('academic-stuffs.create')}}">Add Academic Staff</a>
                                        <a href="{{route('academic-stuffs.index')}}">Manage Academic Staff</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#student" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Student</span>
                            </a>
                            <div class="collapse" id="student">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('students.create')}}">Add Student</a>
                                        <a href="{{route('students.index')}}">Manage Student</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#quranChapter" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Quran Chapter</span>
                            </a>
                            <div class="collapse" id="quranChapter">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('quran-chapters.create')}}">Add Quran Chapter</a>
                                        <a href="{{route('quran-chapters.index')}}">Manage Quran Chapter</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#quranVerse" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Quran Verse</span>
                            </a>
                            <div class="collapse" id="quranVerse">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('quran-verses.create')}}">Add Quran Verse</a>
                                        <a href="{{route('quran-verses.index')}}">Manage Quran Verse</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#quranTranslationProvider" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Quran Translation Provider</span>
                            </a>
                            <div class="collapse" id="quranTranslationProvider">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('quran-translation-providers.create')}}">Add Quran Translation Provider</a>
                                        <a href="{{route('quran-translation-providers.index')}}">Manage Quran Translation Provider</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a data-bs-toggle="collapse" href="#quranTranslation" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Quran Translation</span>
                            </a>
                            <div class="collapse" id="quranTranslation">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('quran-translations.create')}}">Add Quran Translation</a>
                                        <a href="{{route('quran-translations.index')}}">Manage Quran Translation</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li>
                            <a data-bs-toggle="collapse" href="#Admin" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span>Admin</span>
                            </a>
                            <div class="collapse" id="Admin">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admins.create')}}">Add Admin</a>
                                        <a href="{{route('admins.index')}}">Manage Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    {{-- </ul>
                </div>
            </li> --}}

            <li>
                <a data-bs-toggle="collapse" href="#designation" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>Designation</span>
                </a>
                <div class="collapse" id="designation">
                    <ul class="side-nav-third-level">
                        <li>
                            <a href="{{route('designations.create')}}">Add Designation</a>
                            <a href="{{route('designations.index')}}">Manage Designation</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" href="#usc" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span>User Submitted Certificate</span>
                </a>
                <div class="collapse" id="usc">
                    <ul class="side-nav-third-level">
                        <li>
                            <a href="{{route('user-submitted-certificates.create')}}">Add User Submitted Certificate</a>
                            <a href="{{route('user-submitted-certificates.index')}}">Manage User Submitted Certificate</a>
                        </li>
                    </ul>
                </div>
            </li>

            

        </ul>
    </div>
</li>


        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
