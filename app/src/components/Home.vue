<script>
export default {
  data() {
    return {
      list: [
        {
          image: 'https://media.journoportfolio.com/system/images/8ac94200-3cac-4953-a28f-3ef3eaa07eba.jpeg',
          title: 'Why Young Adult Books Are So Important',
          intro: "Article in Kettle Magazine Spring 2018 about young adult books and why they're so important for today's teens and adults alike.",
          cat: 'Books',
          company: 'Kettle Magazine',
          date: '27th April 2018',
        },
      ],
    };
  },
};
</script>

<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4" v-for="entry in list" :key="entry.title">
        <img :src="entry.image" :alt="entry.title" />

        <span class="card-date">{{ entry.company }} {{ entry.date }}</span>
        <span class="card-title">{{ entry.title }}</span>
        <span class="card-intro">{{ entry.intro }}</span>
      </div>
    </div>
  </div>
</template>

<style scoped>
.card-date {
  font-size: 10px;
}

.card-title {
  font-weight: 400;
  display: block;
  margin-bottom: 4px;
}

img {
  width: 100%;
}
</style>
