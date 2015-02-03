@section('menu_top')
<div class="page-header navbar">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="/">
			    <img src="{{ asset('assets/img/logo.jpg'); }}" alt="" class="logo-default" height="24" />
			</a>
			<div class="menu-toggler sidebar-toggler hide"></div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
                <?php $languages = Language::all(); ?>
                @if(!empty($languages))
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <?php
                    $iso = explode('_',L4gettext::getLocale());
                    $iso = isset($iso[1])?strtolower($iso[1]):strtolower($iso[0]);
                    ?>
                    <span class="flags-sprite flags-{{ $iso  }}"></span>
                    <span class="badge badge-grey">{{ count($languages) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($languages as $language)
                                <?php
                                $iso = explode('_',$language['iso']);
                                $iso = isset($iso[1])?strtolower($iso[1]):strtolower($iso[0]);
                                ?>
                                <li>
                                    <a href="/set-locale/{{$language['iso']}}">
                                        <span class="details">
                                            <span class="flags-sprite flags-{{ $iso }}"></span>
                                            {{ $language['libelle'] }}
                                        </span>
                                    </a>
                                </li>
                        @endforeach
                    </ul>
                </li>
                @endif


				<?php $tasks = Config::get('menu.tasks'); ?>
				@if(!empty($tasks))
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <span class="badge badge-default">{{ count($tasks) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($tasks as $task)
                             @if(\Verdikt\Helpers\UserUtils::hasAccess($task['action']))
                                <li>
                                    <a href="{{action($task['action'])}}" target="_blank">
                                        <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="glyphicon glyphicon-{{ $task['icon'] }}"></i>
                                            </span>
                                            {{ $task['libelle'] }}
                                        </span>
                                    </a>
                                </li>
                             @endif
                        @endforeach
                    </ul>
                </li>
				@endif


				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					    <img alt="" class="img-circle" src="{{ Gravatar::src(\Verdikt\Helpers\UserUtils::getEmail()) }}" />
					    <span class="username username-hide-on-mobile">{{ \Verdikt\Helpers\UserUtils::getDisplayName() }}</span>
					    <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{ route('user.profile') }}">
							<i class="icon-user"></i> {{ _('My Profile') }} </a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ route('login.logout') }}">
							<i class="icon-key"></i> {{ _('Log Out') }} </a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
@stop