<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="bg-white">
    <!-- Header -->
    <header>
        <img class="w-full" src="{{url('storage').'/'.$config->banner}}" alt="">
    </header>

    <main class="isolate">

            <livewire:landinpages.formulario form_id="{{$formulario->id}}" cor="{{$config->cor_primaria}}" />
    </main>


</div>

