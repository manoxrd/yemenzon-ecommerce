<script setup lang='ts'>
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { toast } from 'vue-sonner';
import DeleteDialog from '@/components/admin/DeleteDialog.vue';
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
} from '@/components/ui/dialog'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import Spinner from '@/components/ui/spinner/Spinner.vue';
import { store, update, destroy } from '@/routes/admin/categories';
import type { Category } from '@/types';

const isOpenDialog = ref(false)
const editCategory = ref<Category | null>(null);

const form = useForm({
  name: ''
})

const openCreate = () => {
  form.reset()
  editCategory.value = null
  isOpenDialog.value = true;
}

const openEdit = (category: Category) => {
  editCategory.value = category
  form.name = category.name
  isOpenDialog.value = true;
}

const deleteForm = useForm({
  _method: 'delete'
})

const deleteCategory = (category_id: number) => {
  deleteForm.delete(destroy.url(category_id), {
    onSuccess: () => {
      toast.success('Your Category has been Deleted successfully');
    }
  })
}


const submit = () => {
  if (editCategory.value) {
    form.patch(update.url(editCategory.value.id), {
      onSuccess: () => {
        form.reset()

        isOpenDialog.value = false
        editCategory.value = null

        toast.success('Your Category has been updated successfully');
      }
    })
  } else {
    form.post(store.url(), {
      onSuccess: () => {
        form.reset()

        isOpenDialog.value = false
        editCategory.value = null

        toast.success('Your Category has been created successfully');
      }
    })
  }
}

defineProps<{
  categories: Category[]
}>();


</script>

<template>

  <Head title="All Categories"></Head>

  <div class="p-5">
    <div class="flex items-center justify-between mb-4 gap-x-4">
      <span>{{ categories.length }} categories</span>
      <hr class="flex-1 border-secondary-foreground" />
      <Button @click.prevent="openCreate" class="bg-blue-600 text-foreground cursor-pointer" variant="secondary">
        Create
      </Button>
    </div>
    <div class="w-full overflow-x-auto rounded-lg border border-gray-200 dark:border-sidebar-border">
      <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
        <thead
          class="border-b border-gray-200 bg-gray-50 text-gray-700 dark:border-sidebar-border dark:bg-sidebar dark:text-gray-200">
          <tr>
            <th scope="col" class="px-4 py-3 font-medium">Category Name</th>
            <th scope="col" class="px-4 py-3 text-center font-medium">
              Actions
            </th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="category in categories" :key="category.id"
            class="border-b border-gray-100 transition-colors last:border-0 hover:bg-gray-50 dark:border-sidebar-border/50 dark:hover:bg-sidebar-accent/50">
            <td class="px-4 py-3 font-medium text-gray-900 dark:text-gray-100">
              {{ category.name }}
            </td>

            <td class="px-4 py-3 text-center">
              <Button @click.prevent="openEdit(category)" class="text-blue-500 cursor-pointer" variant="link">
                Edit
              </Button>
              <DeleteDialog @on-delete-product="deleteCategory(category.id)" variant="link" :restore="false"
                model="category" />
            </td>
          </tr>

          <tr v-if="categories.length === 0">
            <td colspan="6" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
              No categories found.
            </td>
          </tr>
        </tbody>
      </table>


      <Dialog v-model:open="isOpenDialog">
        <form>
          <DialogContent class="sm:max-w-[425px]">
            <DialogHeader>
              <DialogTitle>{{ editCategory ? 'Edit Categroy' : 'Create Category' }}</DialogTitle>
              <DialogDescription>
                {{ editCategory ? "Make changes to your category here. Click save when you're done." : `Make a new
                category here.Click save when you're done.`}}
              </DialogDescription>
            </DialogHeader>
            <div class="grid gap-4">
              <div class="grid gap-3">
                <Label for="name">Name</Label>
                <Input id="name" name="name" v-model="form.name" />
                <InputError v-if="form.errors.name" :message="form.errors.name" />
              </div>

            </div>
            <DialogFooter>
              <DialogClose as-child>
                <Button variant="outline">
                  Cancel
                </Button>
              </DialogClose>
              <Button type="submit" @click.prevent="submit">
                <Spinner v-if="form.processing" />
                {{ editCategory ? 'Save changes' : 'Create' }}
              </Button>
            </DialogFooter>
          </DialogContent>
        </form>
      </Dialog>
    </div>
  </div>
</template>