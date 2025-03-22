<x-layouts.app title="Categorias" >

    <div class="mb-8 flex justify-between items-center">

        <flux:breadcrumbs >
            <flux:breadcrumbs.item :href="route('admin.dashboard')" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Categorias</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <a href="{{route('admin.categories.create')}}" class="btn btn-red">
            Nuevo
        </a>

    </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        URL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha
                    </th>
                    <th scope="col" class="px-6 py-3" width="100px">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $categorie)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$categorie->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$categorie->name}}

                        </td>
                        <td class="px-6 py-4">
                            {{$categorie->slug}}

                        </td>
                        <td class="px-6 py-4">
                            {{$categorie->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{route('admin.categories.edit',$categorie)}}" class="btn btn-blue">Edit</a>
                                <form class="delete_form" action="{{route('admin.categories.destroy',$categorie)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@push('js')
    <script>
        forms = document.querySelectorAll('.delete_form')
        forms.forEach(
            form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "No podrás revertir esto",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, Eliminar",
                        cancelButtonText: "Cancelar",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });

                });
            });
    </script>
@endpush




</x-layouts.app>


