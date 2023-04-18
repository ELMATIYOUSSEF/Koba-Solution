<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>          
                <li class="active"> <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                @role('admin')
                <li class="list-divider"></li>
                <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('Customers.index')}}"> All customers </a></li>
                    </ul>
                </li>
                @endrole
                
                <li class="submenu"> <a href="#"><i class="fas fa-hand-holding"></i> <span> Camion </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        @role('admin')
                        <li><a href="{{route('camions.index')}}"> All Camion </a></li>
                        @endrole
                        @role('driver')
                        <li><a href="{{route('Mycamion')}}"> My Camion </a></li>
                        @endrole
                    </ul>
                </li>                
               @role('admin')
                <li class="submenu"> <a href="#"><i class="fab fa-first-order"></i> <span> Orders </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('orders.index')}}">All Orders </a></li>
                    </ul>
                </li>
                
                <li class="submenu"> <a href="#"><i class="fas fa-comments"></i> <span> FeedBack </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="{{route('feedbacks.index')}}">All FeedBack </a></li>
                    </ul>
                </li>

                <li class="submenu"> <a href="#"><i class="fas fa-money-check-alt"></i><span> Reglement </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="invoices.html">Invoices </a></li>
                        <li><a href="expenses.html">All Reglement </a></li>
                    </ul>
                </li>
                <li class="submenu"> <a href="#"><i class="fas fa-user-tag"></i> <span> Role </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="salary.html">All Role </a></li>
                        <li><a href="salary-veiw.html">add Role </a></li>
                    </ul>
                </li>            
                <li class="submenu"> <a href="#"><i class="fe fe-table"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a href="expense-reports.html">Expense Report </a></li>
                        <li><a href="invoice-reports.html">Invoice Report </a></li>
                    </ul>
                </li>
                <li> <a href="pricing.html"><i class="far fa-money-bill-alt"></i> <span>consumption</span></a> </li>
                <li> <a href="{{route('settings.index')}}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
              @endrole
            </ul>
        </div>
    </div>
</div>