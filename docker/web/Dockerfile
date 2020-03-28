FROM goalgorilla/open_social_docker:dev

LABEL maintainer="Russell Jones"

# Set variables
ARG USERNAME=vessel
ARG USER_UID=1337
ARG USER_GID=$USER_UID

# Install apps & cleanup
RUN apt-get update && apt-get install -y \
  sudo \
  wget \
  zsh \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#
# Create a non-root user to use if preferred - see https://aka.ms/vscode-remote/containers/non-root-user.
RUN groupadd --gid $USER_GID $USERNAME \
  && useradd -s /bin/zsh --uid $USER_UID --gid $USER_GID -m $USERNAME \
  && echo $USERNAME ALL=\(root\) NOPASSWD:ALL > /etc/sudoers.d/$USERNAME\
  && chmod 0440 /etc/sudoers.d/$USERNAME

# Install oh-my-zsh
USER $USERNAME
RUN sh -c "$(wget -O- https://raw.githubusercontent.com/jonesrussell/zsh-in-docker/master/zsh-in-docker.sh)" -- \
  -t palenight \
  -p git \
  -p https://github.com/zsh-users/zsh-autosuggestions \
  -p https://github.com/zsh-users/zsh-completions \
  -p https://github.com/zsh-users/zsh-history-substring-search
USER root

# Install drush
COPY --from=drush/drush /usr/local/bin/drush /usr/local/bin/drush

WORKDIR /var/www
