<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner" style="overflow-y: scroll; height: 100%">
        <ul class="vertical-nav-menu">
            <!---------------------     Start Dashbroad section     --------------------->
            <li class="app-sidebar__heading">Dashboard</li>
            <!--            --><?php //dd(request()->routeIs('home'))
            ?>
            <li>
                <a class="{{ request()->routeIs('admin/home') ? 'mm-active' : '' }}" href="{{ route('admin.home') }}">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            @can('Exam_List')
                <li class="app-sidebar__heading">Test</li>
                <li>
                    <a class="{{ request()->is(['admin/exam-administration']) ? 'mm-active' : '' }}"
                        href="{{ route('admin.exam-list') }}">
                        <i class=" metismenu-icon fa-solid fa-chart-simple"></i>
                        Test management
                    </a>
                </li>
            @endcan
            @can('Level_List')
                <li class="app-sidebar__heading">Levels</li>
                <li>
                    <a class="{{ request()->is(['admin/level']) ? 'mm-active' : '' }}"
                        href="{{ route('admin.level-list') }}">
                        <i class=" metismenu-icon fa-solid fa-chart-simple"></i>
                        Level management
                    </a>
                </li>
            @endcan
            <li class="app-sidebar__heading">Topics</li>
            {{-- Vocabulary --}}
            @if (Gate::check('Vocabulary_List') || Gate::check('Question_Vocabulary_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-gears"></i>
                        Vocabulary
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Vocabulary_List')
                            <li>
                                <a class="{{ request()->is(['admin/volabulary-level-test']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.vocabulary-list') }}">
                                    <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan
                        @can('Question_Vocabulary_List')
                            <li>
                                <a class="{{ request()->is(['admin/volabulary-level-test/question-list']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.vocabulary-question-list') }}">
                                    <i class="metismenu-icon fa-solid fa-clipboard-question"></i>
                                    Question Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            {{-- Pronunciation  --}}
            @if (Gate::check('Talking_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-microphone"></i>
                        Pronunciation
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        <li>
                            <a class="{{ request()->is(['admin/pronunciation-level-test/topic-list']) ? 'mm-active' : '' }}"
                                href="{{ route('admin.pronunciation-topic-list') }}">
                                <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                Topics Management
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- Grammar --}}
            @if (Gate::check('Grammar_List') || Gate::check('Question_Grammar_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-spell-check"></i>
                        Grammar
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Grammar_List')
                            <li>
                                <a class="{{ request()->is(['admin/grammar-level-test']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.grammar-list') }}">
                                    <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan
                        @can('Question_Grammar_List')
                            <li>
                                <a class="{{ request()->is(['admin/grammar-level-test/question-list']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.grammar-question-list') }}">
                                    <i class="metismenu-icon fa-solid fa-clipboard-question"></i>
                                    Question Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            {{-- Listening --}}
            @if (Gate::check('Listening_List') || Gate::check('Question_Listening_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-ear-listen"></i>
                        Listening
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Listening_List')
                            <li>
                                <a class="{{ request()->is(['admin/topic-listening-level-test']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.topic-listening-list') }}">
                                    <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan
                        @can('Question_Listening_List')
                            <li>
                                <a class="{{ request()->is(['admin/listening-level-test/question-list']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.listening-question-list') }}">
                                    <i class="metismenu-icon fa-solid fa-clipboard-question"></i>
                                    Question Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            {{-- Speaking --}}
            @if (Gate::check('Speaking_List') || Gate::check('Question_Speaking_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-head-side-cough"></i>
                        Speaking
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Speaking_List')
                            <li>
                                <a class="{{ request()->is(['admin/speaking-level-test']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.speak-list') }}">
                                    <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan

                        @can('Question_Speaking_List')
                            <li>
                                <a class="{{ request()->is(['admin/speaking-level-test/question-list']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.speak-question-list') }}">
                                    <i class="metismenu-icon fa-solid fa-clipboard-question"></i>
                                    Question Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            {{-- Reading --}}
            @if (Gate::check('Reading_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa-solid fa-book-open-reader"></i>
                        Reading
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Reading_List')
                            <li>
                                <a class="{{ request()->is(['admin/reading-level-test/topic-list']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.reading-topic-list') }}">
                                    <i class="metismenu-icon fa-solid fa-laptop-file"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            {{-- Writing --}}
            @if (Gate::check('Lesson_List'))
                <li class="mm-parent">
                    <a href="#" aria-expanded="false">
                        <i class="metismenu-icon fa fa-pencil" aria-hidden="true"></i>
                        Writing
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse">
                        @can('Lesson_List')
                            <li>
                                <a class="{{ request()->is(['admin/lesson']) ? 'mm-active' : '' }}"
                                    href="{{ route('admin.lesson-list') }}">
                                    <i class="metismenu-icon fa-solid fa-swatchbook"></i>
                                    Topics Management
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if (Gate::check('User_List') || Gate::check('Role_List'))
                <li class="app-sidebar__heading">User</li>
            @endif
            @can('User_List')
                <li>
                    <a class="{{ request()->is(['admin/users']) ? 'mm-active' : '' }}"
                        href="{{ route('admin.user-list') }}">
                        <i class="metismenu-icon fa-regular fa-user"></i>
                        {{ Auth::user()->is_admin == 1 ? 'User management' : 'Test History' }}

                    </a>
                </li>
            @endcan
            @can('Role_List')
                <li>
                    <a class="{{ request()->is(['admin/roles']) ? 'mm-active' : '' }}"
                        href="{{ route('admin.role-list') }}">
                        <i class="metismenu-icon fa-solid fa-users"></i>
                        Role management
                    </a>
                </li>
            @endcan
            <li>

        </ul>
    </div>
</div>
