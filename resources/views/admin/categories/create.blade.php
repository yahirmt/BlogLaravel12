<x-layouts.app title="Nueva Categoria" >
    <div class="mb-8 flex justify-between items-center">
        <flux:breadcrumbs >
            <flux:breadcrumbs.item :href="route('admin.dashboard')" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item :href="route('admin.categories.index')" separator="slash">Categorias</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Nueva</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <div class="card">

        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf

            <div>
                <flux:input name="name" label="Categoria" description="Nombre de la categoria" value="{{old('name')}}"/>
            </div>

            <div class="flex justify-end mt-5">
                <flux:button type="submit">Registrar</flux:button>
            </div>

        </form>

    </div>



</x-layouts.app>
