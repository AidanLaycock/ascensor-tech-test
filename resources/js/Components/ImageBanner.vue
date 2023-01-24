<template>
    <section class="relative py-24 px-4">
        <div class="z-20 relative text-white text-center">
            <h1 class="text-4xl tracking-tight sm:text-center sm:text-4xl mb-4"><slot></slot></h1>
        </div>
        <div class="absolute inset-0 h-auto z-10">
            <img src="https://images.unsplash.com/photo-1672352401101-ca80966a602f?auto=format&fit=crop&w=1920&q=80" alt="" class="h-full w-full object-fit-cover">
        </div>
    </section>
</template>
