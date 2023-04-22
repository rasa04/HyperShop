<template>
  <div class="grid grid-rows-2 grid-cols-none h-screen w-screen bg-cyan-800 flex justify-center select-none	">
    <div class="min-w-screen mt-5 h-24 p-3 text-center text-5xl text-zinc-200 font-bold">
      <RouterLink
          id="back"
          class="rounded p-3
          hover:bg-zinc-200 hover:text-cyan-800 ease-linear	duration-200"
          :to="{name: 'home'}"
      >Back</RouterLink>
    </div>
    <img class="h-3/4 items-center pointer-events-none margin:auto" src="@/assets/images/404/404.png" alt="404">
  </div>
</template>