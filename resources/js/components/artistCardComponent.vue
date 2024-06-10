<template>
    <router-link :to="`/artists/artist`" class="flex flex-col gap-y-2 justify-center items-center">
        <slot name="artist_image"/>
        <div>
            <slot name="artist_name"/>
        </div>
    </router-link>
</template>
