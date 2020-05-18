FROM goalgorilla/open_social_docker:dev

LABEL maintainer="Russell Jones"

# Install apps & cleanup
RUN apt-get update && apt-get install -y \
  sudo \
  unzip \
  wget \
  zip \
  zsh \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install oh-my-zsh
RUN sh -c "$(wget -O- https://raw.githubusercontent.com/jonesrussell/zsh-in-docker/master/zsh-in-docker.sh)" -- \
  -t palenight \
  -p git \
  -p https://github.com/zsh-users/zsh-autosuggestions \
  -p https://github.com/zsh-users/zsh-completions \
  -p https://github.com/zsh-users/zsh-history-substring-search

# Install drush
# COPY --from=drush/drush /usr/local/bin/drush /usr/local/bin/drush

# Adjust php configuration
COPY vessel.ini /usr/local/etc/php/conf.d/99-vessel.ini

# WORKDIR /var/www
