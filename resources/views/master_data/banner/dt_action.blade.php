<a class="btn btn-primary btn-xs" href="{{ route('mpl.admin.banners.view',$obj->id) }}">View</a>
<a class="btn btn-primary btn-xs" href="{{ route('mpl.admin.banners.edit',$obj->id) }}">Edit</a>

<form method="POST" action="{{route('admin.sales.discount.destroy', $obj->id)}}" template='form' class="inline">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
</form>
