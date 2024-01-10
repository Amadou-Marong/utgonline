<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #header>
      Dashboard
      <div class="p-4 bg-white rounded-lg shadow-xs">
        Edit User
      </div>
    
    </template>
    <div class="p-4 bg-white rounded-lg shadow-xs">
      
      <form @submit.prevent="submit">

        
        <div>
            <InputLabel for="name" value="name" />

            <input v-model="form.name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
        </div>
        <div>
            <InputLabel for="email" value="email" />

            <input v-model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" value="{{user.email}}"/>
        </div>
        <div>
            <InputLabel for="status" value="status" />
            <select name="" id="" v-model="form.status" class="rounded-md">
              <option value="active" >active</option>
              <option value="inactive">inactive</option>
            </select>
        </div>
        <!-- <div>
            <InputLabel for="password" value="password" />

            <input v-model="form.password" id="password" class="block mt-1 w-full" type="password" name="password" required autofocus autocomplete="password" value="{{user.password}}"/>
        </div> -->

        <div class="mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                User Type
            </span>
            <div class="mt-2">
                <!-- <label class="inline-flex items-center text-gray-600 dark:text-gray-400 cursor-pointer">
                    <input v-model="form.role" type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray cursor-pointer" name="role" value="2">
                    <span class="ml-2">Admin</span>
                </label> -->
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400 cursor-pointer">
                    <input v-model="form.role" type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray cursor-pointer" name="role" value="3">
                    <span class="ml-2">Lecturer</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400 cursor-pointer">
                    <input v-model="form.role" type="radio" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray cursor-pointer" name="role" value="0">
                    <span class="ml-2">Student</span>
                </label>
            </div>
        </div>

        <div class="flex mt-4">

            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing">
              Update User
            </PrimaryButton>

        </div>
    </form>
    
    </div>

  </AuthenticatedLayout>
</template>

<script setup>

  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import Swal from 'sweetalert2';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  // import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  // import TextInput from '@/Components/TextInput.vue';
  import { Head, useForm } from '@inertiajs/vue3';




const props = defineProps({
    user: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.user.id,
    name: props.user.name,
    email: props.user.email,
    status: props.user.status,
    role: props.user.role,
});


const submit = () => {
    form.patch(route("admin.users.update", props.user.id));
};



</script>
