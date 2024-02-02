

@foreach ($category->subCategories as $subCategory)
<option value="{{$subCategory->id}}">{{$defCount.$subCategory->name}}
</option>

@if (($subCategory->subCategories))
@include('user.admin.subcat', ['category' => $subCategory, 'defCount' => $defCount.'-'])
    
@endif                        
@endforeach



