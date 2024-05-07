<script setup>

const props = defineProps({
    id: { type: String, required: true },
    size: { Type: String, default: null }
})

const emit = defineEmits(['closeModal'])

</script>

<template>
    <!-- Modal -->
    <div class="modal fade" :id="props.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" :class="props.size">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="title" />
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="emit('closeModal')"></button>
                </div>
                <div class="modal-body">
                    <slot name="body" />
                </div>
                <div class="modal-footer">
                    <slot name="footer" />
                </div>
            </div>
        </div>
    </div>
</template>