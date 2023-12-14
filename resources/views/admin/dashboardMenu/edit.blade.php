<form action="{{ route('menu.update', $menu->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="menu_group">Group name</label>
    <input type="text" class="form-control mb-3" placeholder="Group name" name="menu_group"
        value="{{ $menu->menu_group }}">
    <label for="menu_group">Menu icon</label>
    <input type="text" class="form-control mb-3" placeholder="Menu Icon" name="menu_icon"
        value="{{ $menu->menu_icon }}">
    <label for="menu_group">Menu name</label>
    <input type="text" class="form-control mb-3" placeholder="Menu name" name="menu_name"
        value="{{ $menu->menu_name }}">
    <label for="menu_group">Menu path</label>
    <input type="text" class="form-control mb-3" placeholder="Menu path" name="menu_path"
        value="{{ $menu->menu_path }}">
    <button type="submit" class="btn btn-sm btn-info mt-3">Submit</button>
</form>
