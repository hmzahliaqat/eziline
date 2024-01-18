<template>





<a @click="toggleNotification()" class="float-right cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
  <path fill-rule="evenodd" d="M12 5a4 4 0 0 0-8 0v2.379a1.5 1.5 0 0 1-.44 1.06L2.294 9.707a1 1 0 0 0-.293.707V11a1 1 0 0 0 1 1h2a3 3 0 1 0 6 0h2a1 1 0 0 0 1-1v-.586a1 1 0 0 0-.293-.707L12.44 8.44A1.5 1.5 0 0 1 12 7.38V5Zm-5.5 7a1.5 1.5 0 0 0 3 0h-3Z" clip-rule="evenodd" />
</svg></a>


<div class="flex">

  <!-- Right Sidebar -->
  <div v-show="showNotification" class="fixed overflow-y-auto top-0 right-0 h-full w-64 bg-gray-800 text-white p-4">
    <!-- Close Button -->
    <button class="text-white hover:text-gray-300 focus:outline-none" @click="toggleNotification()">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        class="h-6 w-6">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </button>

    <!-- Notification Header -->
    <div class="text-xl font-bold my-4">Notifications</div>

    <div class="">
    <!-- Notification List -->
    <div v-for="items in notifications" class=" ">
      <!-- Notification Item Example -->
      <div class="flex items-start mb-4">
        <div class="w-8 h-8 bg-indigo-500 rounded-full flex-shrink-0"></div>
        <div class="ml-3">
          <!-- <p class="">New Notification 1</p> -->
          <p class="text-xs text-white">{{ items.body }}</p>
        </div>
      </div>
    </div>
      <!-- Add more notification items as needed -->

    </div>
  </div>
</div>






<div class=" overflow-hidden  sm:rounded-lg">


<button @click="toggleTask()" class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
    Create New Task
  </button>
  <hr class="py-5">


  <!-- search starts here -->
 <div class=" mb-2 flex flex-col items-center justify-center  overflow-hidden sm:py-12">
  <input v-model="searchQuery" type="search"  placeholder="Search Here..." class="py-3 px-4 w-full rounded shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">

  <ul  v-show="searchQuery!=''"  v-for="items in searchResults" class="w-full shadow-xl">
<div>
    <li @click="getTaskDetails(items.id)" class="w-full cursor-pointer text-gray-700 p-4 block mt-2 bg-white rounded-t-md" >
      <p class="font-extrabold">  {{ items.taskName }}</p>
    <p class="text-green-600" v-html=" items.discription "></p>

    </li>
</div>
</ul>
</div>





<ul  v-for="items in tasks.data" role="list" class="divide-y divide-gray-100 max-w-7xl align-center md:ml-8 shadow-xl xl:ml-10 ">
    <li    class="flex justify-between gap-x-6 mb-3 py-5 px-2 rounded-xl cursor-pointer border-y-2 bg-white">
    <div class="block md:flex min-w-0 gap-x-4">
      <!-- <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
      <div @click="getTaskDetails(items.id)" class="min-w-0 flex-auto">
       <div class="flex">
        <p class="text-sm font-semibold leading-6 text-gray-900">{{ items.taskName }}</p><h6 class="text-base ml-10 font-medium leading-tight">

            <span v-if="items.Status=='todo'"
              class="inline-block whitespace-nowrap rounded-[0.27rem] bg-blue-300 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700"
              >To Do</span
            >
            <span v-else-if="items.Status=='inprogress'"
              class="inline-block whitespace-nowrap rounded-[0.27rem] bg-yellow-300 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700"
              >In Progress</span
            >
            <span v-else
              class="inline-block whitespace-nowrap rounded-[0.27rem] bg-green-300 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-[0.75em] font-bold leading-none text-primary-700"
              >Completed</span
            >
          </h6>
        </div>
        <p class="mt-1 truncate text-xs text-green-700 font-extrabold leading-5 text-gray-500" v-html="items.discription"></p>
      </div>

      <div class="md:hidden flex">
      <p class=" text-sm">posted by</p>

      <p class="text-sm ml-2 font-extrabold leading-6 text-gray-900">{{ items.user.name }}</p>
    </div>


<div class="flex md:ml-6">
<a @click="updateTaskInstance(items.id)">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 text-green-600">
  <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
  <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
</svg>

</a>

<a class="ml-2">
    <svg @click="deleteTask(items.id)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 text-red-600">
  <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
</svg>

</a>

<!-- Delete Confirmation  model -->
<div v-show="deleteConfirmation" id="deleteModal" tabindex="-1" aria-hidden="true" class=" md:translate-x-80 md:translate-y-40 overflow-y-auto overflow-x-hidden  fixed  z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button  type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
            <div class="flex justify-center items-center space-x-4">
                <button  data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancel
                </button>
                <button  type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Yes, I'm sure
                </button>
            </div>
        </div>
    </div>
</div>
</div>


    </div>

    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">{{ items.user.name }}</p>
      <p class="mt-1 text-xs leading-5 text-gray-500">Posted <time datetime="2023-01-23T13:23Z">17 sep</time></p>
    </div>
    <div class="pr-2 flex">
     <h4 class="font-bold text-green-500">  {{ items.likes }}  </h4>&nbsp;
        <svg v-if="items.like.length"  @click="toggleLike(items.id)"   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
  <path  d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
</svg>
<svg  v-else   @click="toggleLike(items.id)"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
</svg>
</div>
</li>
</ul>
<Pagination class="float-right"
        :data="tasks"
        @pagination-change-page="getTasks" />




        <!--Create New Task  -->
<div v-show="createTaskToggle" class="modal   fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-white "></div>

    <div class="modal-container fixed w-full h-full z-50 overflow-y-auto ">

      <div @click="toggleTask()" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>

      </div>

      <!-- Add margin if you want to see grey behind the modal-->
      <div class="modal-content container mx-auto h-auto text-left p-4">

        <!--Title-->
        <div class="flex border-b-2  justify-between items-center pb-2">
          <p class="text-2xl text-purple-700 font-bold">Create New Task</p>
        </div>

        <!--Body-->
        <form class="w-full pt-2">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Task Name
      </label>
      <input v-model="taskData.taskName" name="taskName" class="appearance-none block w-full bg-white text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-purple-700 focus:bg-white" id="grid-first-name" type="text"  placeholder="Enter task Name">
      <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-2">

<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
    Status
  </label>
  <div class="relative">
    <select v-model="taskData.status" name="status" class="block appearance-none w-full bg-white border border-purple-500 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-purple-900" id="grid-state">
      <option value='todo'>To Do</option>
      <option value='inprogress'>InProgress</option>
      <option value='completed'>Completed</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
  </div>
</div>

</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Discription
      </label>
  <QuillEditor v-model:content="taskData.discription" class="w-full px-3" contentType="html" placeholder="Write your comment..." toolbar="minimal" theme="snow" />

      <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
  </div>

</form>
<hr class="mt-24">
        <!--Footer-->
        <div class="flex justify-end pt-2  cursor-pointer ">
          <button @click="toggleTask()" class="px-4 cursor-pointer bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Close</button>
          <button @click="createTask()" class=" px-4 cursor-pointer bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Submit</button>
        </div>

      </div>
    </div>
</div>

<!-- Update Task -->
<div v-show="updateTaskToggle" class="modal   fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-white "></div>

    <div class="modal-container fixed w-full h-full z-50 overflow-y-auto ">

      <div @click="toggleTaskUpdate()" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>

      </div>

      <!-- Add margin if you want to see grey behind the modal-->
      <div class="modal-content container mx-auto h-auto text-left p-4">

        <!--Title-->
        <div class="flex border-b-2  justify-between items-center pb-2">
          <p class="text-2xl text-purple-700 font-bold">Update Task</p>
        </div>

        <!--Body-->
        <form class="w-full pt-2">
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Task Name
      </label>
      <input v-model="updateTaskData.taskName" name="taskName" class="appearance-none block w-full bg-white text-gray-700 border border-purple-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-purple-700 focus:bg-white" id="grid-first-name" type="text"  placeholder="Enter task Name">
      <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    </div>
</div>
<div class="flex flex-wrap -mx-3 mb-2">

<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
    Status
  </label>
  <div class="relative">
    <select v-model="updateTaskData.status"  name="status" class="block appearance-none w-full bg-white border border-purple-500 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-purple-900" id="grid-state">

        <option  value='todo'>To Do</option>
      <option value='inprogress'>InProgress</option>
      <option value='completed'>Completed</option>
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
  </div>
</div>

</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Discription
      </label>
  <QuillEditor v-model:content="updateTaskData.discription" class="w-full px-3" contentType="html" placeholder="Write your comment..." toolbar="minimal" theme="snow" />

      <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
  </div>

</form>
<hr class="mt-24">
        <!--Footer-->
        <div class="flex justify-end pt-2  cursor-pointer ">
          <button @click="toggleTaskUpdate()" class="px-4 cursor-pointer bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Close</button>
          <button @click="updateTask(updateTaskData.id)" class=" px-4 cursor-pointer bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Update</button>
        </div>

      </div>
    </div>
</div>

            </div>


            <div v-show="taskDetailToggle" class="modal   fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-white "></div>

    <div class="modal-container fixed w-full h-full z-50 overflow-y-auto ">

      <div @click="toggleTaskDetail()" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-black text-sm z-50">
        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>

      </div>

      <!-- Add margin if you want to see grey behind the modal-->
      <div class="modal-content container mx-auto h-auto text-left p-4">

        <!--Title-->
        <div class="flex border-b-2 w-full  justify-between items-center pb-2">
          <p class="text-2xl text-purple-700 font-bold">Task Detail</p>
        </div>

        <div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">
            <div class="lg:flex items-center justify-center w-full">
                <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:w-full lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
                    <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
                        <div class="flex items-start justify-between w-full">
                            <div class="pl-3 w-full">
                                <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{ taskDetail.taskName }}</p>
                                <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">{{ taskDetail.likes }} Votes</p>
                            </div>
                            <div role="img" aria-label="bookmark">
                               <svg  class="focus:outline-none dark:text-white text-gray-800" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5001 4.66667H17.5001C18.1189 4.66667 18.7124 4.9125 19.15 5.35009C19.5876 5.78767 19.8334 6.38117 19.8334 7V23.3333L14.0001 19.8333L8.16675 23.3333V7C8.16675 6.38117 8.41258 5.78767 8.85017 5.35009C9.28775 4.9125 9.88124 4.66667 10.5001 4.66667Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                            </div>
                        </div>
                    </div>
                    <div class="px-2">
                        <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600 dark:text-gray-200 " v-html="taskDetail.discription"></p>
                        <div tabindex="0" class="focus:outline-none flex">
                            <div v-if="taskDetail.status==0" class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">TO DO</div>
                            <div v-else-if="taskDetail.status==1" class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">In Progress</div>
                            <div v-else="taskDetail.status==2" class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">Completed</div>


                        </div>
                    </div>
                </div>
</div>

        </div>



</div>

<!-- comment section -->
<div class="w-full bg-white rounded-lg border p-1 ">
    <h3 class="font-semibold p-1">Discussion</h3>


    <div class="w-full px-3 mb-2 mt-6 ql">
        <QuillEditor v-model:content="Comment.body" class="w-full px-3" contentType="html" placeholder="Write your comment..." toolbar="minimal" theme="snow" />

    </div>
<hr class="mt-10">
    <div @click="createComment(taskDetail.id)" class="w-full flex justify-end cursor-pointer  px-3 my-3">
        <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-indigo-500 text-lg" value='Post Comment'>
    </div>



    <div class="block">

        <!-- Comment Container -->
        <div>
            <div class="block w-full justify-between border rounded-md">

                <div v-for="comments in comments" class="p-3">
                    <div class="flex gap-3 items-center">
                        <img src="https://avatars.githubusercontent.com/u/22263436?v=4"
                                class="object-cover w-10 h-10 rounded-full border-2 border-emerald-400  shadow-emerald-400">
                        <h3 class="font-bold">
                            {{ comments.name }}
                            <br>
                            <span class="text-sm text-gray-400 font-normal">Level 1</span>
                        </h3>
                    </div>
                    <p v-html="comments.body" class="text-gray-600 mt-2">

                    </p>

                </div>
</div>

        </div>
        <!-- END Comment Container  -->

    </div>


</div>

      </div>
    </div>




</template>

<script>
import axios from 'axios';
import { QuillEditor } from '@vueup/vue-quill';
import { TailwindPagination } from  'laravel-vue-pagination';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
    export default {

        components: {
            'QuillEditor': QuillEditor,
            'Pagination':TailwindPagination,
  },
        data(){
            return{
              createTaskToggle:false,
              taskDetailToggle:false,
              updateTaskToggle:false,
              showNotification:false,
              deleteConfirmation:false,


              tasks:[],
              taskDetail:{},
              comments:[],
              likes:[],
              userRole:null,
              searchQuery:'',
              searchResults:[],
              notifications:[],
              authUser:null,



              'taskData':{
                'taskName':'',
                'discription':'',
                'status':'',
              },

              'updateTaskData':{
                'id':'',
                  'taskName':'',
                  'discription':'',
                   'status':'',
              },

              'Comment':{
                'body':'',
                  }

            }
        },


        watch:{

            searchQuery(after,before){
                this.searchTasks();
            }

        },

        methods:{

            toggleTask(){
                this.createTaskToggle = !this.createTaskToggle;
            },
            toggleTaskDetail(){
                this.taskDetailToggle = false;
            },
            toggleNotification(){
                 this.showNotification = !this.showNotification;
            },
            toggleTaskUpdate(){
                this.updateTaskToggle = !this.updateTaskToggle;
            },
            toggleDeleteConfirm(){
                this.deleteConfirmation = !this.deleteConfirmation;
            },


            createTask(){
                axios.post('/createTask',this.taskData).then(res=>{
                    let instance = $toast.success('Task Created!',{
                position:'top-right',
            });
                }).catch(error=>{
                    let instance = $toast.error('Something Went Wrong!',{
                position:'top-right',
            });
                    console.log(error);
                })
            },

            getTasks(page=1){
                axios.get('/getTasks?page=' + page).then(res=>{
                    this.tasks=res.data;
                }).catch(error=>{
                    console.log(error);
                })
            },

            getTaskDetails(id){

                axios.get('/taskDetails/'+id).then(res=>{
                    this.taskDetail=res.data;

                    this.comments=res.data.comment;
                    // console.log(this.comments);
                    this.taskDetailToggle=true;

                }).catch(error=>{
                    console.log(error);
                })
            },

          updateTaskInstance(id){
            if(this.userRole==2 || this.userRole==1){
            axios.post('updateTaskInstance/'+id).then(res=>{
                this.updateTaskData.id=res.data.id;
                this.updateTaskData.taskName=res.data.taskName;
                this.updateTaskData.status=res.data.status;
                this.updateTaskData.discription=res.data.discription;

                 this.updateTaskToggle=true;
            }).catch(error=>{
                console.log(error);
            })
        }else{
            let instance = $toast.info('Only admin and manager can perform this action!',{
                position:'top-right',
            });
        }
          },

          updateTask(id){
if(this.userRole==2 || this.userRole==1){
            axios.post('/updateTask/'+id,this.updateTaskData).then(res=>{
                this.getTasks();
                let instance = $toast.success('Task Updated!',{
                position:'top-right',
            });
            }).catch(error=>{
                let instance = $toast.error('Something Went Wrong!',{
                position:'top-right',
            });
                console.log(error);
            })
        }else{
            let instance = $toast.info('Only admin and manager can perform this action!',{
                position:'top-right',
            });
        }
          },

          deleteTask(id){
if(this.userRole==2){
            axios.post('/deleteTask/'+id).then(res=>{
                    this.getTasks();
                    this.deleteConfirmation=false;
                    let instance = $toast.success('Task Deleted!',{
                position:'top-right',
            });
            }).catch(error=>{
                let instance = $toast.error('Something Went Wrong!',{
                position:'top-right',
            });
                console.log(error);
            })
        }else{
            let instance = $toast.info('Only admin can perform this action!  ',{
                position:'top-right',
            });
        }
        },

            createComment(id){
                axios.post('/createComment/'+id,this.Comment).then(res=>{

                }).catch(error=>{
                    console.log(error);
                                })
            },

            toggleLike(id){
                axios.post('/toggleLike/'+id).then(res=>{
                this.likes=res.data;
                this.getTasks();
                }).catch(error=>{
                    console.log(error);
                })
            },

            getUserRole(){
             axios.post('/getUserRole').then(res=>{
                 this.userRole=res.data;
                //  console.log(this.userRole);
             }).catch(error=>{
                console.log(error);
             })
            },


            searchTasks(){
                axios.post('/searchTasks/'+this.searchQuery).then(res=>{

                  this.searchResults=res.data;


                }).catch(error=>{
                    console.log(error);
                })
            },

            getNotifications(){
                axios.post('/getNotifications').then(res=>{
                  this.notifications=res.data;
                }).catch(error=>{
                    console.log(error);
                })
            },




        },




    mounted() {
        console.log('Component mounted.');
        this.getTasks();
        this.getUserRole();
        this.getNotifications();

        axios.post('/getAuthUser').then(res => {
            const user = res.data;  //owner id

//listner for comment notification targeting owner
            Echo.private(`commentnotify.${user}`)
                .listen('commentNotifyEvent', (e) => {
                    console.log(e);

                    this.notifications.push({
                        'body':e.notification,
                    })

                    let instance = $toast.info(e.notification,{
                position:'top-right',
            });
                });

            }).catch(error => {
            console.log(error);
        })


// listner for Comments
        Echo.private(`comment`)
            .listen('commentEvent', (e) => {
                this.comments.push({
                    'body': e.body,
                    'name': e.name,
                });
                console.log(e);
            });


    }


}
</script>
