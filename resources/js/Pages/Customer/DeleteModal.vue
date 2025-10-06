<template>
    <div
        v-if="show"
        class="modal fade show d-block"
        tabindex="-1"
        style="background-color: rgba(0, 0, 0, 0.5)"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle"></i>
                        Konfirmasi Hapus
                    </h5>
                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        @click="close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bi bi-trash display-1 text-danger mb-3"></i>
                        <h5>Apakah Anda yakin ingin menghapus customer ini?</h5>
                        <div v-if="customer" class="alert alert-warning mt-3">
                            <strong>{{ customer.name }}</strong
                            ><br />
                            <small>{{ customer.email }}</small>
                        </div>
                        <p class="text-muted">
                            Data yang dihapus tidak dapat dikembalikan.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        @click="close"
                    >
                        Batal
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="confirm"
                        :disabled="processing"
                    >
                        <span
                            v-if="processing"
                            class="spinner-border spinner-border-sm me-2"
                        ></span>
                        <i class="bi bi-trash"></i>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        show: Boolean,
        customer: Object,
    },
    emits: ["close", "confirm"],
    data() {
        return {
            processing: false,
        };
    },
    methods: {
        close() {
            this.$emit("close");
        },
        confirm() {
            this.processing = true;
            this.$emit("confirm");

            // Reset processing state after a delay
            setTimeout(() => {
                this.processing = false;
            }, 1000);
        },
    },
};
</script>
