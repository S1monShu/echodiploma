<template>
    <div class="group flex flex-col gap-y-2 justify-center items-center">
        <div class="rounded-2xl w-[90%] cursor-pointer img-responsive">
            <div class="rounded-2xl relative top-20 z-10 flex justify-center items-center">
                <button class="rounded-2xl opacity-0 group-hover:opacity-100 flex justify-center items-center">
                    <img src="../../images/Play.svg" alt="image">
                </button>
            </div>
            <slot name="genre_image"/>
        </div>
        <div>
            <slot name="genre_title"/>
        </div>
    </div>
</template>
