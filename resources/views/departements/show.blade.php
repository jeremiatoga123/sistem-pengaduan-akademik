<ul>
    @foreach ($departement->permissions as $permission)
    <li>{{$permission->name }}</li>
    @endforeach
</ul>