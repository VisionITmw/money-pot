<div data-role="navview" data-expand="false">
    <div class="navview-pane bg-grayBlue fg-white">
        <button class="pull-button ">
            <span class="default-icon-menu "></span>
        </button>
        <div class="suggest-box">
            <input type="text" data-role="input" data-clear-button="false" data-search-button="true">
            <button class="holder">
                <span class="mif-search"></span>
            </button>
        </div>

        <ul class="navview-menu bg-grayBlue fg-white">
            <li>
                <a href="{{route('dashboard')}}">
                    <span class="icon"><span class="mif-dashboard"></span></span>
                    <span class="caption">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{route('loans.index')}}">
                    <span class="icon"><span class="mif-coins"></span></span>
                    <span class="caption">Loans</span>
                    <span class="badges">
                              <span class="badge inline">{{$loan_count}}</span>
                          </span>
                </a>
            </li>
            <li>
                <a href="{{route('loans.penalties')}}">
                    <span class="icon"><span class="mif-credit-card"></span></span>
                    <span class="caption">Penalties</span>
                    <span class="badges">
                              <span class="badge inline">{{$penalties_count}}</span>
                          </span>
                </a>
            </li>
            <li>
                <a href="{{route('repayments')}}">
                    <span class="icon"><span class="mif-money"></span></span>
                    <span class="caption">Repayments</span>
                    <span class="badges">
                              <span class="badge inline">{{$repayments_count}}</span>
                          </span>
                </a>
            </li>
            <li>
                <a href="{{route('schemes.index')}}">
                    <span class="icon"><span class="mif-suitcase"></span></span>
                    <span class="caption">Schemes</span>
                    <span class="badges">
                              <span class="badge inline">{{$schemes_count}}</span>
                          </span>
                </a>
            </li>
            <li>
                <a href="{{route('clients.create')}}">
                    <span class="icon"><span class="mif-user-plus"></span></span>
                    <span class="caption">New Client</span>
                </a>
            </li>
            <li>
                <a href="{{route('clients.index')}}">
                    <span class="icon"><span class="mif-users"></span></span>
                    <span class="caption">Clients</span>
                </a>
            </li>

            <li>
                <a href="{{route('settings')}}">
                    <span class="icon"><span class="mif-cogs"></span></span>
                    <span class="caption">Settings</span>
                </a>
            </li>

            <li>
                <form action="{{route('logout')}}" method="POST" id="logout-form">
                    @csrf
                </form>
                <a href="#logout" onclick="document.getElementById('logout-form').submit()">
                    <span class="icon"><span class="mif-exit"></span></span>
                    <span class="caption">Logout</span>
                </a>
            </li>

        </ul>

    </div>

    <div class="navview-content h-vh-100">
        <div class="container-fluid">

        </div>
    </div>
</div>
