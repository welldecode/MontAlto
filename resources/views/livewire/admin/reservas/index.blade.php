<div>
    <livewire:admin.components.breadcrumb />
    <flux:separator class="md:hidden" />
    <div class="flex-1 max-md:pt-6 self-stretch text-zinc-700   dark:text-zinc-100 mt-10">


        <section>
            <h1
                class="text-3xl font-semibold text-zinc-700 dark:text-zinc-100 mb-10 animate__animated animate__fadeInDown">
                Reservas</h1>
            <livewire:admin.components.dynamic-table :model="\App\Models\Reservation::class" :columns="[
                'id' => 'id',
                'name' => 'Nome',
                'email' => 'Email',
                'phone' => 'Telefone',
            ]" showRoute="admin.reservas.index"
       :fieldTranslations="[
    'id' => __('ID'),
    'name' => __('Nome'),
    'email' => __('Email'),
    'cpf' => __('CPF'),
    'address' => __('Endereço'),
    'product.name' => __('Produto')
]"
    :viewFields="['id', 'name', 'email', 'cpf', 'address', 'product.name']" 
                :showParams="['id' => 'id']" />
        </section>
    </div>
</div>
