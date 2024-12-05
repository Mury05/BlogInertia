<template>
    <div>
      <h1>{{ article.title }}</h1>
      <p>{{ article.content }}</p>
      <small>Publié le : {{ article.date }} par {{ article.author }}</small>
  
      <div>
        <h3>Commentaires :</h3>
        <ul>
          <li v-for="comment in article.comments" :key="comment.date">
            <strong>{{ comment.user }}</strong>: {{ comment.content }} <small>{{ comment.date }}</small>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      article: Object,
    },
  }
  </script>
  