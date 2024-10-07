<template>
    <div class="custom-container">
        <v-card class="main-card  bordered-card strong-shadow mb-5 mt-5 " style="border-radius: 30px;">
            <!-- Заголовок карточки -->
            <v-card-title class="text-center bordered-text strong-shadow mb-3 pa-3"><h2 v-if="product">{{
                    product.name
                }}</h2>
            </v-card-title>
            <!-- Картинка -->
            <div class="image-container mb-5">
                <v-img v-if="product" max-width="100%"
                       :src="`${product.urlPhoto}`"></v-img>
            </div>
            <!-- Текст описания -->
            <v-card-text v-if="product" class="bordered-text custom-width strong-shadow text-center">
                {{ product.description }}
            </v-card-text>
        </v-card>
        <v-card class="main-card bordered-card strong-shadow my-margin" style="border-radius: 30px;">
            <div class="button-container pa-3 mb-5">
                <button   class="btn strong-shadow py-2 px-5">Изменить название</button>
                <button  class="btn strong-shadow py-2 px-5">Изменить картинку</button>
                <button  class="btn strong-shadow py-2 px-5">Изменить название</button>
            </div>
            <!-- Поля ввода -->
            <v-text-field v-model="name"
                          class="custom-input"
                          label="Введите новое название"
                          outlined
            ></v-text-field>

            <v-text-field v-model="description"
                          class="custom-input "
                          label="Введите новое описание"
                          outlined
            ></v-text-field>

            <!-- Инпут для загрузки файла -->
            <v-file-input prepend-icon="mdi mdi-ab-testing" append-icon="mdi mdi-ab-testing" base-color="info"
                          style="width: 100%" label="File input"></v-file-input>
            <v-btn  @click="" color="primary" style="width: 95%" class="mt-4 mb-3">
                Сохранить
            </v-btn>


        </v-card>
    </div>
</template>
<script>

export default {
    name: "ShowComponent",

    data() {
        return {
            product: null, // Здесь будут данные о товаре
            name: null, // Для нового названия
            description: null, // Для нового описания
            urlPhoto: null, // Для загрузки файла
        };
    },

    mounted() {
        this.getProduct() //для вывода конкретной карточки
    },
    methods: {
        getProduct() {
            axios.get(`/api/card/get/${this.$route.params.id}`) // Запрос к API для получения данных
                .then(res => {
                    this.product = res.data; // Сохраняем данные о товаре
                    this.name = this.product.name; // Заполнение поля названия
                    this.description = this.product.description; // Заполнение поля описания
                })
                .catch(error => {
                    console.error('Ошибка при получении данных о товаре:', error);

                });
        },

        UpdateProduct(id) {
            axios.patch(`/api/card/get/${id}`, {name: this.name, description: this.description, urlPhoto: this.urlPhoto})
                .then(res => {
                    console.log(res.data);
                    alert('Данные успешно обновлены!');
                })
    }
}}

</script>

<style scoped>
.custom-container {
    margin: 0 auto !important;
    width: 70% !important;
}

/* Основная карточка */
.main-card {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    flex-direction: column !important;
    padding: 20px;
}

/* Изображение */
.image-container {
    width: 95%;

}

img {
    width: 95% !important;
    border-radius: 40px !important;
}

/* Текст внутри карточки */
.bordered-text {
    width: 95% !important;
    border-radius: 15px !important;

    /*padding: 10px !important; !* Отступы внутри рамки *!*/
}


/* Сильная тень */
.strong-shadow {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5) !important; /* Настройка сильной тени */
}

/* Центрирование текста */
.text-center {
    text-align: center;
}


.button-container {
    display: flex; /* Устанавливает Flexbox */
    justify-content: space-between; /* Разделяет кнопки на равное расстояние */
    width: 100%; /* Контейнер займет всю ширину */
    /*  padding: 10px; !* Отступы внутри контейнера *!*/
}

.btn {
    /*   padding: 10px 20px; !* Отступы внутри кнопок *!*/
    background-color: white; /* Цвет фона кнопок */

    border-radius: 20px; /* Скругляем углы */
    cursor: pointer; /* Иконка указателя при наведении */
}

.custom-input {
    width: 95%;
}
</style>
