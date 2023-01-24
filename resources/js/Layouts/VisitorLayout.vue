<template>
    <div>
        <VisitorNavBar />
        <slot></slot>
        <footer class="w-full bg-white" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>

            <div class="px-4 py-12 mx-auto bg-gray-50 sm:px-6 lg:px-16">
                <div class="flex flex-wrap items-baseline lg:justify-center">
                  <span class="mt-2 text-sm font-light text-gray-500">
                    Copyright © {{ new Date().getFullYear() }}
                  </span>
                </div>
            </div>
        </footer>
    </div>
</template>
<script setup>
import VisitorNavBar from "@/Components/VisitorNavBar.vue";
</script>
