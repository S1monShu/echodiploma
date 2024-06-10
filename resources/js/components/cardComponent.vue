<template>
    <div class="group flex flex-col gap-y-2 justify-center items-center">
        <div class="rounded-2xl w-[90%] cursor-pointer img-responsive">
            <div class="rounded-2xl relative top-20 z-10 flex justify-center items-center">
                <slot name="song_button"/>
            </div>
            <slot name="song_image"/>
        </div>
        <div>
            <slot name="song_title"/>
            <slot name="song_artist"/>
        </div>
    </div>
</template>
