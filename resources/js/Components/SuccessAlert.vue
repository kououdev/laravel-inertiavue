<template>
    <div
        v-if="show"
        class="modal fade show d-block"
        tabindex="-1"
        style="background-color: rgba(0, 0, 0, 0.5)"
    >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle"></i>
                        Berhasil
                    </h5>
                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        @click="close"
                    ></button>
                </div>
                <div class="modal-body text-center">
                    <i
                        class="bi bi-check-circle display-1 text-success mb-3"
                    ></i>
                    <p class="mb-0">{{ message }}</p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-success"
                        @click="close"
                    >
                        OK
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
        message: String,
    },
    emits: ["close"],
    mounted() {
        if (this.show) {
            // Auto close after 3 seconds
            setTimeout(() => {
                this.close();
            }, 3000);
        }
    },
    methods: {
        close() {
            this.$emit("close");
        },
    },
};
</script>
