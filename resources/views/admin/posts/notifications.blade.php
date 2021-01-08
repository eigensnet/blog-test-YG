@if($notifications ?? '' )
    <li class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle danger " href="#" role="button" id="dropdownMenuLink"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $notifications->count() }} Notifications
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <ul class="list-unstyled">
                @foreach($notifications as $notification)
                    <li><a class="dropdown-item" href="admin/posts/{{reset($notification)}}">Neuer Post : {{$loop->index+1}}</a></li>
                @endforeach
            </ul>
        </div>
    </li>
@endif