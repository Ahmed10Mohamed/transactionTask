<ul class="nav nav-pills flex-column flex-md-row mb-4">
    <li class="nav-item">
        <a class="nav-link @if($class == 'profile') active @endif" @if($class == 'profile') href="javascript:void(0);" @else href="{{url('Profile')}}"@endif>
        <i class="ti-xs ti ti-users me-1"></i> {{translate('Account')}}</a
        >
    </li>
    <li class="nav-item">
        <a class="nav-link @if($class == 'change_pssword') active @endif" @if($class == 'change_pssword') href="javascript:void(0);" @else href="{{url('Profile/Security')}}"@endif>

        <i class="ti-xs ti ti-lock me-1"></i> {{translate('Security')}}
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link @if($class == 'lang') active @endif" @if($class == 'lang') href="javascript:void(0);" @else href="{{url('Profile/Langauge')}}"@endif>

        <i class="ti-xs ti ti-language me-1"></i> {{translate('Langauge')}}</a>
    </li>
   


</ul>
