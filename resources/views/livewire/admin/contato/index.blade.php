<div>
    <livewire:admin.components.breadcrumb />
    <flux:separator class="md:hidden" />
    <div class="flex-1 max-md:pt-6 self-stretch text-zinc-700   dark:text-zinc-100 mt-10">


        <section>
            <h1
                class="text-3xl font-semibold text-zinc-700 dark:text-zinc-100 mb-10 animate__animated animate__fadeInDown">
                Contatos</h1>
            <livewire:admin.components.dynamic-table :model="\App\Models\Contato::class" :columns="[
                'id' => 'id',
                'name' => 'Nome',
                'email' => 'Email',
                'phone' => 'Telefone',
            ]" showRoute="admin.reservas.index"
                :showParams="['id' => 'id']" 
                
    :viewFields="['id', 'name', 'subject', 'message']"  />
        </section>
    </div>
</div>
