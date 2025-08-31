<div class="">
    <div class="flex max-md:flex-col items-start px-6">

        <flux:separator class="md:hidden" />
        <div class="flex-1 max-md:pt-6 self-stretch text-white mt-10 container mx-auto">

            <livewire:admin.components.breadcrumb />

            <section class=" ">
                <h1 class="text-3xl font-semibold text-zinc-50 mb-10 animate__animated animate__fadeInDown">Cadastrar
                    Produto</h1>

                <form method="POST" wire:submit.prevent="save">
                    <div class="md:flex md:flex-col md:gap-5 lg:grid lg:grid-cols-5 lg:grid-rows-1 lg:gap-14">
                        <div class="col-span-3 bg-zinc-900 p-6 rounded-lg border border-zinc-600 shadow-lg">
                            <div class="mb-8">
                                <flux:heading>Cadastrar Produto</flux:heading>
                                <flux:text class="mt-2">Digite todos campos obrigatórios para cadastrar.</flux:text>
                            </div>


                            <div class="grid grid-cols-2 grid-rows-1 gap-4">
                                <div>
                                    <flux:field>
                                        <flux:label class="mr-2">Nome do Produto</flux:label>
                                        <flux:input wire:model="name" type="text" />
                                        <flux:error name="name" />
                                    </flux:field>
                                </div>
                                <div>
                                    <flux:field>
                                        <flux:label class="mr-2">Ano</flux:label>
                                        <flux:input wire:model="year" type="number" />
                                        <flux:error name="year" />
                                    </flux:field>
                                </div>
                                <div>
                                    <flux:field>
                                        <flux:label>Tipo</flux:label>
                                        <flux:select wire:model="tipo" placeholder="Tipo de Carro">
                                            <flux:select.option>Flex</flux:select.option>
                                            <flux:select.option>Gasolina</flux:select.option>
                                            <flux:select.option>Alcool</flux:select.option>
                                        </flux:select>
                                    </flux:field>
                                </div>
                                <div>
                                    <flux:field>
                                        <flux:label>Espaço</flux:label>
                                        <flux:select wire:model="espaco" placeholder="Espaço do Carro">
                                            <flux:select.option>5 Pessoas</flux:select.option>
                                            <flux:select.option>7 Pessoas</flux:select.option>
                                        </flux:select>
                                    </flux:field>
                                </div>
                                <div class="col-span-2">
                                    <flux:field>
                                        <flux:label>Descrição</flux:label>
                                        <flux:textarea placeholder="Descrição do Produto" wire:model="description" />
                                        <flux:error name="description" />
                                    </flux:field>
                                </div>

                                <div class="col-span-2">
                                    <div style="--col-span-default: 1 / -1;"
                                        class="flex flex-col gap-1 col-[--col-span-default] ">
                                        @foreach ($prices as $key => $value)
                                            <flux:field class="mb-4" wire:key="prices.{{ $key }}">
                                                <flux:label>Preço {{ $key }}</flux:label>
                                                <flux:input.group>
                                                    <flux:input placeholder="Digite um Preço" onfocus="this.value=''"
                                                        onchange="this.blur();"
                                                        wire:model="prices.{{ $key }}" />
                                                </flux:input.group>
                                            </flux:field>
                                        @endforeach

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-span-2 col-start-4">
                            <div
                                class="bg-zinc-900 p-4 rounded-lg shadow-xl border border-zinc-600 flex flex-col justify-center gap-5">
                                <div>

                                    <flux:field>
                                        <flux:label class="mr-2">Imagem</flux:label>
                                        <flux:input type="file" wire:model="attachments" multiple   accept="image/*" />

                                        @foreach ($attachments as $file)
                                            <img src="{{ $file->temporaryUrl() }}" class="h-32 mt-2 inline-block">
                                        @endforeach
                                        <flux:error name="attachments" />
                                    </flux:field>
                                </div>
                                <flux:field>
                                    <flux:label>Status do Produto</flux:label>
                                    <flux:select wire:model="status" placeholder="Selecione o Status da Empresa">
                                        <flux:select.option value="ativo" selected>Produto Ativo
                                        </flux:select.option>
                                        <flux:select.option>Produto Desativado</flux:select.option>
                                    </flux:select>
                                    <flux:error name="status" />
                                </flux:field>

                                <hr class="border border-zinc-600">
                                <flux:button variant="primary" class="text-white" type="submit">Cadastrar Produto
                                </flux:button>
                            </div>
                        </div>
                </form>
            </section>
        </div>
    </div>
</div>
</div>
