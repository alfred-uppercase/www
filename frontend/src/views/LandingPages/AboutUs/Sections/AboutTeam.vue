<script setup>

import { ref, onMounted } from "vue";
import axios from 'axios';

const categories  = ref([]);
const subCategories  = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/api/get_categories');
    console.log('Response from get_categories:', response.data);
    categories.value = response.data;
    for (const category of categories.value) {
      const getSubCategory = await axios.get(`/api/get_sub_categories/${category.id}`);
      console.log('Response from get_sub_categories:', getSubCategory.data);

      subCategories.value.push(getSubCategory.data);
    }
  } catch (error) {
    console.error('Error fetching categories:', error);
  }

});


</script>

<template>
  <section class="pb-5 position-relative mx-n3">
    <div class="container">
      <div class="related-articles-text"><div class="user-content" dir="auto"><h2 class="display-5">Nos principales catégories</h2>
<p class="lead">Trouvez ce qu'il vous faut chez nous</p>
</div></div>
      <div class="related-articles-content">
        <div v-for="(category, index) in categories" :key="category.id" class="article">
          <div class="article-container"><img
            :src="`/uploads/category_thumbnails/${category.thumbnail}`"
              loading="lazy" class="article-img">
              <div class="article-text">
                <h3 class="heading" dir="auto">{{ category.name }}</h3><a class="link stretched-link"
                :href="`/recherche?search_string=&selected_city_id=&selected_category_id=${category.id}`"></a>
            </div>
          </div>
          <div v-for="subCategory in subCategories[index]" :key="subCategory.id" class="sub_article">
          <a :href="`/recherche?search_string=&selected_city_id=&selected_category_id=${subCategory.id}`" class="sub-category-link">
            <div class="sub-category">
              <span class="sub-category-number">
                <i :class="subCategory.icon_class"></i>
              </span>
              <span class="sub-category-title">{{ subCategory.name }}</span>
              <span class="sub-category-arrow"><i class="fa fa-arrow-right"></i></span>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
</template>
<style>
.related-articles-content {
  flex-direction: row;
    flex-wrap: wrap;
    display: flex;
}
.related-articles-content .article{
  width: 25%;
  padding: 0 20px;
}
.article-container{
  max-height: 100%;
  height: 100%;
}
.article-container img{
  width: 100%;
  border-radius: 20px;
}
</style>