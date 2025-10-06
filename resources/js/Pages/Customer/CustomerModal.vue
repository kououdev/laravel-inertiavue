<template>
    <div
        v-if="show"
        class="modal fade show d-block"
        tabindex="-1"
        style="background-color: rgba(0, 0, 0, 0.5)"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ isEdit ? "Edit Customer" : "Tambah Customer" }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        @click="close"
                    ></button>
                </div>
                <form @submit.prevent="save">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label"
                                        >Nama
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="form-control"
                                        :class="{ 'is-invalid': errors.name }"
                                        id="name"
                                        placeholder="Masukkan nama customer"
                                        required
                                    />
                                    <div
                                        v-if="errors.name"
                                        class="invalid-feedback"
                                    >
                                        {{ errors.name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label"
                                        >Email
                                        <span class="text-danger"
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        class="form-control"
                                        :class="{ 'is-invalid': errors.email }"
                                        id="email"
                                        placeholder="Masukkan email customer"
                                        required
                                    />
                                    <div
                                        v-if="errors.email"
                                        class="invalid-feedback"
                                    >
                                        {{ errors.email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label"
                                        >Phone</label
                                    >
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        class="form-control"
                                        :class="{ 'is-invalid': errors.phone }"
                                        id="phone"
                                        placeholder="Masukkan nomor telepon"
                                    />
                                    <div
                                        v-if="errors.phone"
                                        class="invalid-feedback"
                                    >
                                        {{ errors.phone }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label"
                                        >Alamat</label
                                    >
                                    <textarea
                                        v-model="form.address"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.address,
                                        }"
                                        id="address"
                                        rows="3"
                                        placeholder="Masukkan alamat customer"
                                    ></textarea>
                                    <div
                                        v-if="errors.address"
                                        class="invalid-feedback"
                                    >
                                        {{ errors.address }}
                                    </div>
                                </div>
                            </div>
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
                            type="submit"
                            class="btn btn-primary"
                            :disabled="processing"
                        >
                            <span
                                v-if="processing"
                                class="spinner-border spinner-border-sm me-2"
                            ></span>
                            {{ isEdit ? "Update" : "Simpan" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive } from "vue";

export default {
    props: {
        show: Boolean,
        customer: Object,
        isEdit: Boolean,
    },
    emits: ["close", "save"],
    data() {
        return {
            processing: false,
            errors: {},
            form: reactive({
                name: "",
                email: "",
                phone: "",
                address: "",
            }),
        };
    },
    watch: {
        show(newVal) {
            if (newVal) {
                this.resetForm();
                if (this.isEdit && this.customer) {
                    this.fillForm();
                }
            }
        },
    },
    methods: {
        resetForm() {
            this.form.name = "";
            this.form.email = "";
            this.form.phone = "";
            this.form.address = "";
            this.errors = {};
            this.processing = false;
        },
        fillForm() {
            this.form.name = this.customer.name || "";
            this.form.email = this.customer.email || "";
            this.form.phone = this.customer.phone || "";
            this.form.address = this.customer.address || "";
        },
        close() {
            this.$emit("close");
        },
        save() {
            this.processing = true;
            this.errors = {};

            // Client-side validation
            if (!this.form.name.trim()) {
                this.errors.name = "Nama harus diisi";
                this.processing = false;
                return;
            }

            if (!this.form.email.trim()) {
                this.errors.email = "Email harus diisi";
                this.processing = false;
                return;
            }

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.form.email)) {
                this.errors.email = "Format email tidak valid";
                this.processing = false;
                return;
            }

            // Emit save event
            this.$emit("save", { ...this.form });

            // Reset processing state after a delay
            setTimeout(() => {
                this.processing = false;
            }, 1000);
        },
    },
};
</script>
