# Contributing

Contributions are **welcome** and will be fully **credited**.

We accept contributions via Pull Requests on [Github](https://github.com/BambooPayment/sdk_php).

## Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - Check the code style with ``$ composer phpcs`` and fix it with ``$ composer phpcs:fix``.

- **We use **[Phpstan](https://github.com/phpstan/phpstan)** to ensure code quality and errors in our code -
  Run ``$ composer phpstan`` to check errors.

- Run ``$ composer test`` get a green light to upload your code to our repository.

- **Add tests!** - Your patch won't be accepted if it doesn't have tests.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept
  up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs
  is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make
  multiple intermediate commits while developing,
  please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages)
  before submitting.

- **Commit Message** we use
  the [Angular Commit Message](https://github.com/angular/angular/blob/master/CONTRIBUTING.md#-commit-message-format),
  we have a GitHub Action that takes the commit message and creates a new tag version based on it

## Running Tests

``` bash
$ composer test
```

**Happy coding**!
