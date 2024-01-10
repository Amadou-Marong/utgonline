<template>
    <Head title="Dashboard"/>
  
    <AuthenticatedLayout>
      <template #header>
            Exams Dashboard
        <div class="p-4 bg-white rounded-lg shadow-xs">
            Create Exam
        </div>
      
      </template>
      <div class="p-4 bg-white rounded-lg shadow-xs">
        
        <form @submit.prevent="submit">
  
          <div>
              <InputLabel for="name" value="name" />
  
              <input v-model="form.name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
          </div>
          <div> 
            <InputLabel for="course_id" value="Course ID:"></InputLabel>
              <select v-model="form.course_id" type="text" name="course_id" id="course_id" class="block mt-1 w-full cursor-pointer">
                    <option value="" disabled selected class="validate">Select Course</option>
                    <!-- v-if="count($courses) > 0" -->
                    <option v-for="course in courses.data" 
            
                        :value="course.id">
                        {{ course.name }}
                    </option>
              </select>

              <!-- <input v-model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" /> -->
          </div> 
          <div>
              <InputLabel for="date" value="date" />
  
              <input v-model="form.date" id="date" class="block mt-1 w-full" type="date"  name="date" required min="<?php echo date('Y-m-d'); "/>
          </div>
          
          <div>
              <InputLabel for="time" value="time" />
  
              <!-- <input v-model="form.time" id="time" class="block mt-1 w-full" type="time" name="time" required /> -->
              <input v-model="form.time" id="time" class="block mt-1 w-full" type="time" name="time" required />
          </div>
          
          <div>
              <InputLabel for="dauration" value="duration" />
  
              <!-- <input v-model="form.time" id="time" class="block mt-1 w-full" type="time" name="time" required /> -->
              <input v-model="form.duration" min="1" id="duration" class="block mt-1 w-full" type="number" name="duration" required />
          </div>
          
          <div class="flex mt-4">
              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save Exam
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
        courses: {
            // type: Array,
            type: Object,
            // default: () => ({}),
        },
    });
  
    const form = useForm({
        name: '',
        course_id: '',
        date: '',
        time: '',
        duration: '',
    });
    const submit = () => {
      // form.post(route('register'), {
      form.post(route('admin.exams.store'), {
        // onFinish: () => form.reset('password', 'password_confirmation'),
        onError: () => Swal.fire({
                        title: "Error!",
                        text: "Something went wrong!",
                        icon: "error",
                  }),
        onSuccess: () => Swal.fire({
                        title: "Success!",
                        text: "Exam created Successfully!",
                        icon: "success",
                  }),
        });
    };
  
  
  </script>
  
  