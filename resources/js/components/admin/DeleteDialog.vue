<script setup lang='ts'>
import { ref } from 'vue';
import { Button} from '@/components/ui/button';
import type { ButtonVariants } from '@/components/ui/button';
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'
import Spinner from '../ui/spinner/Spinner.vue';
const { variant = 'destructive', processing } = defineProps<{
  processing?: boolean,
  variant?: ButtonVariants['variant']
}>();

const emit = defineEmits(['onDeleteProduct']);

const deleteTimer = ref(5);
let intervalId: ReturnType<typeof setInterval> | null = null

const dialogTriggered = (value: boolean) => {
  if (value === true) {
    intervalId = setInterval(() => {
      if (deleteTimer.value > 0) {
        deleteTimer.value--
      } else {
        clearInterval(intervalId)
      }
    }, 1000)
  } else {

    if (intervalId) {
      clearInterval(intervalId)
      intervalId = undefined
    }

    deleteTimer.value = 5
  }
}

</script>

<template>

    <Dialog @update:open="dialogTriggered">
      <DialogTrigger as-child>
        <Button class="cursor-pointer" :variant="variant">
          Delete
        </Button>
      </DialogTrigger>

      <DialogContent class="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>Delete Product</DialogTitle>
          <DialogDescription>
            Are you sure you want to delete this product?, you can restore it whenever you want.
          </DialogDescription>
        </DialogHeader>

        <DialogFooter>
          <DialogClose as-child>
            <Button variant="secondary">
              Cancel
            </Button>
          </DialogClose>
          <Button @click="emit('onDeleteProduct')" variant="destructive" :disabled="processing || deleteTimer > 0"
            class="cursor-pointer">
            <Spinner v-if="processing" /> ({{ deleteTimer }})
            Delete
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>

</template>