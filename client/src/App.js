import React from "react";

import "./App.css";
import Articles from "./Articles";
import * as ArticlesApi from "./Article.api";
import * as AuthApi from "./Auth.api";
import ArticleForm from "./ArticleForm";
import LoginForm from "./LoginForm";
import createApi from "./Api.conf";

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      articles: [],
      isAuthenticated: false,
      isLoginVisible: false
    };
    console.log("construcotr called");
    this.handleArticleSubmit = this.handleArticleSubmit.bind(this);
    this.handleLoginSubmit = this.handleLoginSubmit.bind(this);
  }

  componentDidMount() {
    console.log("componentDidMount is called");
    let token = AuthApi.getToken();
    if (token === null) {
      this.setState({
        isLoginVisible: true,
        isAuthenticated: false
      });
    } else {
      const Api = createApi(token);
      const getArticles = ArticlesApi.getArticles(Api);
      getArticles()
        .then(response => {
          console.log(response.data);
          this.setState({
            articles: response.data,
            isLoginVisible: false,
            isAuthenticated: true
          });
        })
        .catch(() => {
          AuthApi.removeToken();
          this.setState({
            articles: [],
            isLoginVisible: true,
            isAuthenticated: false
          });
        });
    }
  }

  handleArticleSubmit(article) {
    let token = AuthApi.getToken();
    const Api = createApi(token);
    const postArticle = ArticlesApi.postArticle(Api);
    postArticle(article).then(() => {
      this.setState({
        articles: this.state.articles.concat(article)
      });
    });
  }

  handleLoginSubmit(credentials) {
    AuthApi.postCredentials(credentials)
      .then(() => {
        this.setState({
          isAuthenticated: true,
          isLoginVisible: false
        });
        let token = AuthApi.getToken();
        const Api = createApi(token);
        const getArticles = ArticlesApi.getArticles(Api);
        getArticles()
          .then(response => {
            console.log(response.data);
            this.setState({
              articles: response.data,
              isLoginVisible: false,
              isAuthenticated: true
            });
          })
          .catch(() => {
            AuthApi.removeToken();
            this.setState({
              articles: [],
              isLoginVisible: true,
              isAuthenticated: false
            });
          });
      })
      .catch(() => {
        alert("FAILED TO LOGIN");
      });
  }

  render() {
    const { articles, isAuthenticated, isLoginVisible } = this.state;
    console.log("renreing ...", isAuthenticated, isLoginVisible);
    if (isLoginVisible || !isAuthenticated) {
      return <LoginForm onSubmit={this.handleLoginSubmit} />;
    }
    if (isAuthenticated) {
      return (
        <div className="App">
          <Articles articles={articles} />
          <br />
          <ArticleForm onSumbit={this.handleArticleSubmit} />
        </div>
      );
    }
  }
}

export default App;
