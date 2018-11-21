const API_ARTICLES = "/articles";

export const getArticles = Api => () => {
  return Api.get(
    //   "http://127.0.0.1:8000/api/articles.json",
    API_ARTICLES
  );
};

export const postArticle = Api => article => {
  return Api.post(API_ARTICLES, article);
};
