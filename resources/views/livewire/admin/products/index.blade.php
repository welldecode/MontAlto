<div>
    <livewire:admin.components.breadcrumb />
    <flux:separator class="md:hidden" />
    <div class="flex-1 max-md:pt-6 self-stretch text-zinc-700   dark:text-zinc-100 mt-10">


        <section>
            <h1
                class="text-3xl font-semibold text-zinc-700 dark:text-zinc-100 mb-10 animate__animated animate__fadeInDown">
                Produtos</h1>

    <livewire:admin.components.dynamic-table 
    :model="\App\Models\Product::class" 
    :columns="[
        'id' => 'ID',
        'name' => 'Nome',
        'description' => 'Descrição',
        'features' => 'Características',
    ]" 
    editRoute="admin.product.edit"
    :editParam="['id' => 'id']"  
/>
        </section>
    </div>
</div>
